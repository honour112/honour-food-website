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

<h2>Book table Requests <i class="fas fa-calendar-alt" style="color: #d81f38ff;"></i></h2>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Date</th>
      <th>Time</th>
      <th>People</th>
      <th>Requests</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bookings as $booking)
    <tr>
        <td>{{$booking->name}}</td>
        <td>{{$booking->email}}</td>
        <td>{{$booking->date}}</td>
        <td>{{$booking->time}}</td>
        <td>{{$booking->people}}</td>
        <td>{{$booking->requests}}</td>
        <td>{{$booking->phone}}</td>
        <td>
            <div class="buttons">
                <button class="edit"><i class="fa-solid fa-check" style="background-color: lightgreen;"></i></button> 
                <button class="delete"><i class="fa-solid fa-xmark" style="background-color: red;"></i></button>
            </div>
        </td>
    @endforeach
  </tbody>
</table>

@endsection