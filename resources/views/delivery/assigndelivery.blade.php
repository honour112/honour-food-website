@extends('delivery.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #0e0a0bff;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f5e7e8ff;
            color: #080606ff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-paid {
            color: green;
            font-weight: bold;
        }

        .status-unpaid {
            color: red;
            font-weight: bold;
        }

        select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            background-color: #1d3557;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #457b9d;
        }
    </style>
</head>
<body>

<h2><i class="fas fa-truck"></i> My Assigned Orders </h2>

<table id="ordersTable">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id="1">
            <td>#1</td>
            <td>Nkwambi HONOUR</td>
            <td>678123456</td>
            <td>Bonaberi</td>
            <td class="payment-status"><i class="fas fa-times-circle"></i> Unpaid</td>
            <td>
                <select class="status-select">
                    <option value="unpaid" selected>Unpaid</option>
                    <option value="paid">Paid</option>
                </select>
                <button class="update-btn"><i class="fas fa-save"></i> Update</button>
            </td>
        </tr>
        <tr data-id="2">
            <td>#2</td>
            <td>John</td>
            <td>650987654</td>
            <td>Akwa</td>
            <td class="payment-status"><i class="fas fa-check-circle"></i> Paid</td>
            <td>
                <select class="status-select">
                    <option value="unpaid">Unpaid</option>
                    <option value="paid" selected>Paid</option>
                </select>
                <button class="update-btn"><i class="fas fa-save"></i> Update</button>
            </td>
        </tr>
        <tr data-id="3">
            <td>#3</td>
            <td>Samuella</td>
            <td>699555888</td>
            <td>Makepe</td>
            <td class="payment-status"><i class="fas fa-times-circle"></i> Unpaid</td>
            <td>
                <select class="status-select">
                    <option value="unpaid" selected>Unpaid</option>
                    <option value="paid">Paid</option>
                </select>
                <button class="update-btn"><i class="fas fa-save"></i> Update</button>
            </td>
        </tr>
    </tbody>
</table>

<script>
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const select = row.querySelector('.status-select');
            const statusCell = row.querySelector('.payment-status');
            const newStatus = select.value;

            // Update the cell text and icon
            if(newStatus === 'paid') {
                statusCell.innerHTML = '<i class="fas fa-check-circle"></i> Paid';
                statusCell.classList.remove('status-unpaid');
                statusCell.classList.add('status-paid');
            } else {
                statusCell.innerHTML = '<i class="fas fa-times-circle"></i> Unpaid';
                statusCell.classList.remove('status-paid');
                statusCell.classList.add('status-unpaid');
            }

            // Optional: show a quick alert
            alert('Payment status updated to ' + newStatus + ' for Order #' + row.dataset.id);
        });
    });
</script>

</body>
</html>
@endsection