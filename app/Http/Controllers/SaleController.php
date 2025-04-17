<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Customers;
use App\Models\Detail_sale;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function SaleIndex(Request $request)
     {
         $filter = $request->filter;

         $query = Sale::with(['customer', 'user']);

         if ($filter === 'daily') {
             $query->whereDate('sale_date', Carbon::now());
         } elseif ($filter === 'weekly') {
             $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->startOfDay();
             $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY)->endOfDay();
             $query->whereBetween('sale_date', [$startOfWeek, $endOfWeek]);
         } elseif ($filter === 'monthly') {
             $query->whereMonth('sale_date', Carbon::now()->month);
         }

         $sale = $query->get();
         $detail_sale = Detail_sale::with('product')->get();

         return view('employee.purchases.index', compact('sale', 'detail_sale', 'filter'));
     }

    public function AdminIndex()
    {
        $sale = Sale::with(['customer', 'user'])->get();
        $detail_sale = Detail_sale::with(['product'])->get();

        return view('admin.purchases.index',  compact('sale', 'detail_sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();

        return view('employee.purchases.create', compact('product'));
    }

    public function paymentProcess(Request $request)
    {
        // dd($request->all());
        $products = $request->shop;
        $sale_product = [];
        $total_pay = (int)str_replace(['Rp. ', '.'], '', $request->total_payment);
        $total = (int)str_replace(['Rp. ', '.'], '', $request->total);
        $customer_id = null;

        if ($request->customer == 'Member') {
            $phone = $request->phone;
            // $name = $request->name;
            $existCustomer = Customers::where('phone', $phone)->first();

            if ($existCustomer) {
                $existCustomer->update([
                    'point' => $existCustomer->point + ($total / 100),
                ]);
                $customer_id = $existCustomer->id;
            } else {
                // Buat customer baru
                $newCustomer = Customers::create([
                    // 'name' => $name,
                    'phone' => $phone,
                    'point' => $total / 100,
                ]);
                $customer_id = $newCustomer->id;
            }
        }

        // Buat transaksi baru
        $sale = Sale::create([
            'sale_date' => now(),
            'customer_id' => $customer_id, // Bisa NULL untuk non-member
            'total_price' => $total,
            'total_payment' => $total_pay,
            'change' => $total_pay - $total,
            'user_id' => Auth::user()->id,
            'sale_product' => implode(', ', $sale_product) ?? '',
            'used_point' => 0
        ]);

        // Simpan detail produk yang dibeli
        foreach ($products as $product) {
            $product = explode(';', $product);
            $id = $product[0];
            $name = $product[1];
            $price = number_format($product[2], 0, ',', '.');
            $quantity = (int)$product[3];
            $subtotal = (int)$product[4];

            $sale_product[] = "{$name} ( {$quantity} : Rp. {$price} )";

            // Update stok produk
            $productModel = Product::find($id);
            if ($productModel) {
                $productModel->update(['stock' => $productModel->stock - $quantity]);
            }

            // Simpan detail penjualan
            Detail_sale::create([
                'sale_id' => $sale->id,
                'product_id' => $id,
                'quantity' => $quantity,
                'sub_total' => $subtotal,
            ]);
        }

        // Update purchase_product di Sale setelah data dikumpulkan
        $sale->update(['sale_product' => implode(' , ', $sale_product)]);

        // Redirect sesuai kondisi
        if ($request->customer == 'Member') {
            return redirect()->route('employee.EditMember', $sale->id);
        }

        return redirect()->route('employee.DetPrint', $sale->id)->with('success', 'Successfully created Member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = $request->products;

        if (empty($products)) {
            return redirect()->back()->with('failed', 'Please choose product at least 1.');
        }

        $data['products'] = [];
        $data['total'] = 0;

        foreach ($products as $product) {
            $product = explode(';', $product);
            $id = $product[0];
            $name = $product[1];
            $price = $product[2];
            $quantity = $product[3];
            $subtotal = $product[4];

            $data['product'][] = [
                'product_id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'sub_total' => $subtotal,
            ];
            $data['total'] += $subtotal;
        }
        // dd($data['proucts']);
        return view('employee.purchases.payment', $data);
    }

    public function Member(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'sale_id' => 'required|exists:sales,id',
            'customer_id' => 'required|exists:customers,id',
            'check_point' => 'nullable|in:Ya',
        ]);

        $customer = Customers::findOrFail($request->customer_id);
        $name = $request->input('name');

        // Update nama member secara langsung
        $customer->name = $name;
        $customer->save();

        $sale = Sale::findOrFail($request->sale_id);

        if ($request->check_point == 'Ya') {
            $used_point = $customer->point;

            $customer->point = 0;
            $customer->save();

            $sale->used_point = $used_point;
            $sale->total_price -= $used_point;
            $sale->change = $sale->total_payment - $sale->total_price;
        }

        $sale->customer_id = $customer->id;
        $sale->save();

        return redirect()->route('employee.DetPrint', $sale->id)->with('success', 'Successfully created Member');
    }

    public function EditMember($id)
    {
        $sale = Sale::with(['customer', 'user'])->findOrFail($id);
        $detail_sale = Detail_sale::where('sale_id', $sale->id)->with('product')->get();

        $isFirst = false;

        if ($sale->customer) {
            $countPurchase = Sale::where('customer_id', $sale->customer->id)->count();
            $isFirst = $countPurchase <= 1;
        }

        return view('employee.purchases.member', compact('sale', 'detail_sale', 'isFirst'));
    }

    public function Print($id)
    {
        $sale = Sale::with(['customer', 'user'])->findOrFail($id);
        $detail_sale = Detail_sale::where('sale_id', $sale->id)->with('product')->get();
        return view('employee.purchases.print', compact('sale', 'detail_sale'))->with('success', 'Successfully created purchase');
    }

    public function exportPDF($id)
    {
        $sale = Sale::with(['customer', 'user'])->findOrFail($id);
        $detail_sale = Detail_sale::where('sale_id', $sale->id)->with('product')->get();

        $data = [
            'sale' => $sale,
            'detail_sale' => $detail_sale
        ];

        $pdf = PDF::loadView('employee.purchases.exportpdf', $data);

        return $pdf->download('receipt.pdf');
    }

    public function exportPDFAd($id)
    {
        $sale = Sale::with(['customer', 'user'])->findOrFail($id);
        $detail_sale = Detail_sale::where('sale_id', $sale->id)->with('product')->get();

        $data = [
            'sale' => $sale,
            'detail_sale' => $detail_sale
        ];

        $pdf = PDF::loadView('admin.purchases.exportpdf', $data);

        return $pdf->download('receipt.pdf');
    }

    public function dataExcel($id)
    {
        // Fetch the purchase data correctly
        $sale = Sale::with(['customer', 'user'])->find($id);  // Assuming $id is needed

        // Fetch the detail purchase data for the specific purchase
        $detail_sale = Detail_sale::where('sale_id', $sale->id)->with('product')->get();

        // Pass the data to the view
        return view("employee.purchases.excel", compact('sale', 'detail_sale')); // Corrected data passing
    }

    //export ada filter --------------------------------
    public function Excel(Request $request)
    {
      $filter = $request->filter;

      $file_name = 'sale_export.xlsx';
      return Excel::download(new \App\Exports\SalesExport($filter), $file_name);
    }

    // public function Excel()
    // {
    //     $file_name = 'sale_report.xlsx';
    //     return Excel::download(new SalesExport, $file_name);
    // }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

}
