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
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background-color: #f4f4f4; }
        th, td { padding: 10px 15px; text-align: left; }
        th { background-color: #dcdcdc; }
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
        .summary { background-color: #f0f0f0; padding: 10px; }
        .summary td { font-weight: bold; }
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
            Member Status: member / non-member<br>
            Member Phone: klo member 0881<br>
            Member Since: 2023 <br>
            Member Points:  200 
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
            
            <tr>
                <td>strawberry</td>
                <td class="text-right">quantity</td>
                <td class="text-right">Rp 2000</td>
                <td class="text-right">Rp 4000</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
        <table class="summary">
            <tr>
                <td>Total Price</td>
                <td class="text-right">Rp 3000</td>
            </tr>
            <tr>
                <td>Used Point</td>
                <td class="text-right">20</td>
            </tr>
            <tr>
                <td>Price after used point</td>
                <td class="text-right">Rp 700</td>
            </tr>
            <tr>
                <td>Total Pay</td>
                <td class="text-right">Rp 77</td>
            </tr>
            <tr>
                <td>Change</td>
                <td class="text-right">Rp 99</td>
            </tr>
        </table>


    <div class="thank-you">
        <div>
            <div class="text-bold">INVOICE #id</div>
            <div>Date: d F Y</div>
            <div>Cashier: liya</div>
        </div>

        <p>Thank you for shopping at Hao Fruit Market</p>
        <p>Items purchased cannot be exchanged or returned</p>
    </div>
</body>
</html>