<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        h2 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Thank you for your order, {{ $order->customer_name }}!</h2>
        <p>Your order (ID: R{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}) has been received and confirmed.</p>

        <h3>Order Details:</h3>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->details as $item)
                <tr>
                    <td>{{ $item->menuItem->name ?? $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->unit_price, 0, ',', '.') }} FCFA</td>
                    <td>{{ number_format($item->unit_price * $item->quantity, 0, ',', '.') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total Amount:</strong> {{ number_format($order->total, 0, ',', '.') }} FCFA</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
        

        <p>We will notify you once your order is ready. If you have any questions, feel free to contact us at our support email.</p>

        <div class="footer">
            &copy; {{ date('Y') }} bistro bliss. All rights reserved.
        </div>
    </div>
</body>
</html>
