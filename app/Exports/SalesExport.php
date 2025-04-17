<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
     //EXPORT FILTER
     protected $filter;

     public function __construct($filter = null)
     {
         $this->filter = $filter;
     }

     public function collection()
     {
         $query = Sale::with(['customer', 'user', 'detail_sale']);

         if ($this->filter === 'daily') {
             $query->whereDate('sale_date', Carbon::now());
         } elseif ($this->filter === 'weekly') {
             $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY)->startOfDay();
             $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY)->endOfDay();

             $query->whereBetween('sale_date', [$startOfWeek, $endOfWeek]);
         } elseif ($this->filter === 'monthly') {
             $query->whereMonth('sale_date', Carbon::now()->month);
         }

         return $query->get();
     }

     //EXPORT KESELURUHAN -----------------------------------
    // public function collection()
    // {
    //     return Sale::with(['customer', 'user', 'detail_sale'])->get();
    // }


    public function headings(): array
    {
        return [
            "Customer Name", "Number Phone", "Point", "Product", "Total Price", "Total Payment", "Change", "Purchase Date"
        ];
    }

    public function map($item): array
    {
        return [
            $item->customer->name ?? 'Non-Member',
            $item->customer->phone ?? '-',
            $item->customer->point ?? '-',
            $item->sale_product,
            'Rp. ' . number_format($item->total_price, 0, ',', '.'),
            'Rp. ' . number_format($item->total_payment, 0, ',', '.'),
            'Rp. ' . number_format($item->change, 0, ',', '.'),
            Carbon::parse($item->sale_date)->format('d-m-Y'),
        ];
    }
}

