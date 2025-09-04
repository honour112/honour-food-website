@extends('frontdesk.frontdesk-dashboard')

@section('content')

@if(session('success'))
<div class="alert">{{session('success')}}</div>
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>manage Orders</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">
</head>
<body>

<h2>Incoming Reviews</h2>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Review</th>
      <th>date</th>
      <th>action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
    <tr>
        <td>{{$review->name}}</td>
        <td>{{$review->Review}}</td>
        <td>{{$review->date}}</td>
        <td>
          
            <!-- Delete Button -->
            <div class="buttons">
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
          </div>

        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection