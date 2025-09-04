@extends('delivery.layout')

@section('content')
<!-- Stats -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title"> Delivery Agents</span>
        <i class="fas fa-motorcycle stat-icon"></i>
      </div>
      <div class="stat-value">40</div>
      <div class="stat-change">total delivery agents</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Asign Delivery</span>
        <i class="fas fa-users stat-icon"></i>
      </div>
      <div class="stat-value">34</div>
      <div class="stat-change">15 active agent</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Delivered Orders</span>
        <i class="fas fa-table stat-icon"></i>
      </div>
      <div class="stat-value">100</div>
      <div class="stat-change">+15.3% this month</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Status</span>
        <i class="fas fa-user-check stat-icon"></i>
      </div>
      <div class="stat-value">18</div>
      <div class="stat-change">Active or Inactive</div>
    </div>
  </div>

@endsection