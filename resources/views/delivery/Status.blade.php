@extends('delivery.layout')

@section('content')
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">

<h2>Delivery Agent Status</h2>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Agent Name</th>
            <th>Email</th>
            <th>Current Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ Auth::user()->name }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>
                <span class="{{ $status === 'active' ? 'status-active' : 'status-inactive' }}">
                    {{ ucfirst($status) }}
                </span>
            </td>
            <td>
                <form action="{{ route('delivery.status.toggle') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-toggle">
                        {{ $status === 'active' ? 'Set Inactive' : 'Set Active' }}
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection
