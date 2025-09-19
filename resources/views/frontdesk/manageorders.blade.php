@extends('frontdesk.frontdesk-dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Orders</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">
</head>
<body>

<h2>Incoming Orders</h2>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
<style>
    .alert {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: lightgreen;
    }
</style>
@endif

<table>
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Items</th>
      <th>Total Amount</th>
      <th>Payment Status</th>
      <th>Order Status</th>
      <th>Manage Order</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)
      <tr>
        <td>R{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->email ?? 'N/A' }}</td>
        <td>{{ $order->phone }}</td>
        <td>
            @foreach($order->details as $item)
                {{ $item->menuItem->name ?? $item->item_name }} (x{{ $item->quantity }})@if(!$loop->last), @endif
            @endforeach
        </td>
        <td>{{ number_format($order->total, 0, ',', '.') }} FCFA</td>

        {{-- ✅ Payment Status --}}
        <td>
            <form action="{{ route('frontdesk.orders.updatePayment', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                @if($order->payment_status === 'paid')
                    <button type="submit" class="btn-paid" title="Click to mark Unpaid">
                        <i class="fas fa-check-circle paid"></i> Paid
                    </button>
                @else
                    <button type="submit" class="btn-unpaid" title="Click to mark Paid">
                        <i class="fas fa-times-circle unpaid"></i> Unpaid
                    </button>
                @endif
            </form>
        </td>

        {{-- Order Status --}}
        <td>
            @if($order->order_status === 'accepted')
                <i class="fas fa-check-circle paid"></i> Accepted
            @elseif($order->order_status === 'rejected')
                <i class="fas fa-times-circle unpaid"></i> Declined
            @else
                <i class="fas fa-clock pending"></i> Pending
            @endif
        </td>

        {{--  Actions --}}
        <td>
          <div class="buttons">
            <form action="{{ route('frontdesk.orders.accept', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="edit" title="Accept Order">
                    <i class="fa-solid fa-check"></i>
                </button>
            </form>

            <form action="{{ route('frontdesk.orders.decline', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="delete" title="Decline Order">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="9" style="text-align:center;">No orders yet</td>
      </tr>
    @endforelse
  </tbody>
</table>

</body>
</html>
@endsection
