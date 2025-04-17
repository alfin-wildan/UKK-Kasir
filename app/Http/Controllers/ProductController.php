<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $removeRP = str_replace(['RP. ', '.'], '', $request->price);
    //     $request->merge(['price' => $removeRP]);

    //     $request->validate([
    //         'name' => 'required|min:3',
    //         'price' => 'required|numeric|min:1',
    //         'stock' => 'required|numeric|min:1'
    //     ]);

    //     $image = $request->file('image');
    //     $imageValidation = Validator::make(
    //         ['image' => $image],
    //         ['image' => 'image|mimes:png,jpg,jpeg,svg|max:5120']
    //     );

    //     if ($imageValidation->fails()) {
    //         return back()->withErrors($imageValidation)->withInput();
    //     }

    //     $filename = time() . '_' . $image->getClientOriginalName();

    //     $destinationPath = public_path('storage/assets/images/products');
    //     if (!File::exists($destinationPath)) {
    //         File::makeDirectory($destinationPath, 0777, true);
    //     }

    //     $image->move($destinationPath, $filename);
    //     $imagePath = 'assets/images/products/' . $filename;

    //     Product::create([
    //         'name'  => $request->name,
    //         'image' => $imagePath,
    //         'price' => $request->price,
    //         'stock' => $request->stock,
    //     ]);

    //     return redirect()->route('admin.ProductHome')->with('success', 'Product added successfully');
    // }
    public function store(Request $request)
    {
        $removeRP = str_replace(['RP. ', '.'], '', $request->price);
        $request->merge(['price' => $removeRP]);

        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1'
        ]);

        Product::create([
            'name' => $request->name,
            'image' => $request->hasFile('image') ? $request->file('image')->store('product-images', 'public') : null,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect()->route('admin.ProductHome')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::find($id);

        return view('admin.product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     // Bersihkan input harga dari 'RP. ' dan titik
    //     $removeRP = str_replace(['RP. ', '.'], '', $request->price);
    //     $request->merge(['price' => $removeRP]);

    //     // Validasi input
    //     $request->validate([
    //         'name' => 'required|min:3',
    //         'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:5120',
    //         'price' => 'required|numeric|min:1',
    //     ]);

    //     // Ambil produk dari database
    //     $product = Product::findOrFail($id);

    //     // Kalau ada file image baru
    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama kalau ada
    //         if ($product->image && Storage::disk('public')->exists($product->image)) {
    //             Storage::disk('public')->delete($product->image);
    //         }

    //         // Generate nama file baru
    //         $filename = time() . '_' . $request->file('image')->getClientOriginalName();

    //         // Simpan file ke storage/app/public/assets/images/products
    //         $request->file('image')->storeAs('public/assets/images/products', $filename);

    //         // Simpan path di database (akses via /storage/...)
    //         $product->image = 'assets/images/products/' . $filename;
    //     }

    //     // Update data lainnya
    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->save();

    //     return redirect()->route('admin.ProductHome')->with('success', 'Product edited successfully!');
    // }

    public function update(Request $request, $id)
    {
        $removeRP = str_replace(['RP. ', '.'], '', $request->price);
        $request->merge(['price' => $removeRP]);

        $request->validate([
            'name' => 'required|min:3',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:5120',
            'price' => 'required|numeric|min:1',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('product-images', 'public');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.ProductHome')->with('success', 'Product edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $saleWithProduct = $product->detail_sale()->exists();
        if ($saleWithProduct) {
            return redirect()->back()->with('failed', 'Product is already listed with purchase!');
        } else {

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.ProductHome')->with('deleted', 'Product deleted successfully!');
        }
    }


    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'stock' => 'required|numeric|min:' . ($product->stock + 1),
        ], [
            'stock.min' => 'Stock baru harus lebih besar dari stock lama.',
        ]);

        $product->update([
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.ProductHome')->with('success', 'Stock updated successfully!');
    }

    public function employeeIndex()
    {
        $products = Product::all();

        return view('employee.product.index', compact('products'));
    }

}
