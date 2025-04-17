<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receipt </title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .invoice-title { font-size: 24px; font-weight: bold; }
        .shop-info { margin-bottom: 30px; }
        .member-info { margin-bottom: 15px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1px;
            background-color: #f4f4f4;
            font-size: 11px;
        }

        tr, th, td {
            padding: 2px 4px;
            line-height: 1;
            margin: 0;
            border: none;
        }
        th { background-color: #dcdcdc; line-break: }
        td { background-color: #fff; }
        .total-section { margin-top: 20px; text-align: right; }
        .thank-you { margin-top: 30px; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .text-bold { font-weight: bold; }
        .border-top { border-top: 1px solid #000; }
        .total-row td {
            font-weight: bold;
        }
        .summary { background-color: #f0f0f0; padding: 5px; }
        .summary td { font-weight: bold;  padding: 3px 5px; line-height: 1;}
    </style>
</head>
<body>
    <div class="header">
        <div class="invoice-title">RECEIPT</div>
        <div>Hao Fruit Market</div>
        <div>Jl. Raya Wangun No. 123, Bogor</div>
        <div>Phone: 081234567</div>
    </div>

    <div class="flex justify-between">
        <div class="member-info">
            Member Status: {{ $sale->customer ? 'Member' : 'Non-Member'}}<br>
            Member Phone: {{ $sale->customer ? $sale->customer->phone : '-' }}<br>
            Member Since: {{ $sale->customer ? $sale->customer->created_at->format('d F Y') : '-' }}<br>
            Member Points:  {{ $sale->customer ? $sale->customer->point : '-' }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Price</th>
                <th class="text-right">Sub total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_sale as $data)
            <tr>
                <td>{{ $data->product->name }}</td>
                <td class="text-right">{{ $data->quantity }}</td>
                <td class="text-right">Rp {{ number_format($data->product->price, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($data->sub_total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <table class="summary">
            <tr>
                <td>Total Price</td>
                <td class="text-right">Rp {{ number_format($sale->used_point > 0 ? $sale->total_price + $sale->used_point : $sale->total_price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Used Point</td>
                <td class="text-right">{{ $sale->used_point > 0  ? $sale->used_point : '0'  }}</td>
            </tr>
            <tr>
                <td>Price after used point</td>
                <td class="text-right">Rp {{ number_format($sale->used_point > 0 ? $sale->total_price : '0', 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Pay</td>
                <td class="text-right">Rp {{ number_format($sale->total_payment, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Change</td>
                <td class="text-right">Rp {{ number_format( $sale->change, 0, ',', '.')}}</td>
            </tr>
        </table>


    <div class="thank-you">
        <div>
            <div class="text-bold">INVOICE #{{ $sale->id }}</div>
            <div>Date: {{ \Carbon\Carbon::parse($sale->sale_date)->format('d F Y') }}</div>
            <div>Cashier: {{ $sale->user->name }}</div>
        </div>

        <p>Thank you for shopping at Hao Fruit Market</p>
        <p>Items purchased cannot be exchanged or returned</p>
    </div>
</body>
</html>
