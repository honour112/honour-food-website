@extends('frontdesk.frontdesk-dashboard')

@section('content')
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">

<h2>Assign Delivery Agents</h2>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Assign To</th>
            <th>Assigned Agent</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ number_format($order->total, 0, ',', '.') }} FCFA</td>
            <td>
                <form action="{{ route('frontdesk.assign.toAgent', $order->id) }}" method="POST">
                    @csrf
                    <select name="agent_id" required>
                        <option value="">-- Select Agent --</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">
                                {{ $agent->name }} 
                                ({{ $agent->status === 'active' ? '🟢 Active' : '🔴 Inactive' }})
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-toggle">Assign</button>
                </form>
            </td>
            <td>
                @if($order->delivery_agent_id)
                    Assigned to: {{ $order->deliveryAgent->name ?? 'Unknown' }}
                @else
                    Not Assigned
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center;">No orders available for assignment</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
