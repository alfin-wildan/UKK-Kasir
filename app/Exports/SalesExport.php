<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SalesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, WithCustomStartCell
{
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

    public function startCell(): string
    {
        return 'A2'; // Data dimulai dari A3 (judul di A1, heading di A2)
    }

    public function styles(Worksheet $sheet)
{
    $dataCount = count($this->collection());
    $lastRow = $dataCount + 2;

    // Judul
    $sheet->mergeCells('A1:H1');
    $sheet->getCell('A1')->setValue('Data Penjualan Frostymart');
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14)->getColor()->setARGB('FFFFFF');
    $sheet->getStyle('A1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('4F81BD'); // Warna biru yang lebih gelap agar kontras
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
    $sheet->getRowDimension('1')->setRowHeight(25);

    // Heading (baris 2) - warna kuning
    $sheet->getStyle('A2:H2')->getFont()->setBold(true)->setSize(12);
    $sheet->getStyle('A2:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00'); // Warna kuning
    $sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
    $sheet->getStyle('A2:H2')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getRowDimension('2')->setRowHeight(20);

    // Lebar kolom
    $sheet->getColumnDimension('A')->setWidth(20);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(15);
    $sheet->getColumnDimension('D')->setWidth(25);
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(20);
    $sheet->getColumnDimension('H')->setWidth(20);

    // Align data
    $sheet->getStyle("A3:A{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle("B3:B{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle("C3:C{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("D3:D{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle("E3:E{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->getStyle("F3:F{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->getStyle("G3:G{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->getStyle("H3:H{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // Border data
    $sheet->getStyle("A3:H{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
}


    public function columnFormats(): array
    {
        return [
            'E' => '#,##0', // Total Price
            'F' => '#,##0', // Total Payment
            'G' => '#,##0', // Change
        ];
    }
}
