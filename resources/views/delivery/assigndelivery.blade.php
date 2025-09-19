@extends('delivery.layout')

@section('content')
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">

<h2>My Assigned Orders</h2>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Order Date</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <span class="{{ $order->order_status === 'delivered' ? 'status-active' : 'status-inactive' }}">
                        {{ ucfirst($order->order_status) }}
                    </span>
                </td>
                <td>{{ $order->customer_name ?? 'N/A' }}</td>
                <td>{{ $order->location ?? 'N/A' }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                <!-- Add more details as needed -->
            </tr>
        @empty
            <tr>
                <td colspan="5">No orders assigned to you.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection