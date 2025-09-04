@extends('Admin.AdminLayout')

@section('content')
    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Staff Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f9f9f9;
    }

   

    .stats-grid {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .stat-card {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      flex: 1 1 200px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .stat-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .stat-title {
      font-weight: bold;
    }

    .stat-icon {
      font-size: 20px;
      color: #555;
    }

    .stat-value {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .stat-change {
      font-size: 14px;
      color: green;
    }

    .bar-chart {
      display: flex;
      align-items: flex-end;
      gap: 15px;
      height: 220px;
      border-left: 2px solid #333;
      border-bottom: 1px solid #333;
      padding: 10px;
      background: transparent;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .bar {
      width: 40px;
      background: #4CAF50;
      color: white;
      font-size: 12px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      border-radius: 5px 5px 0 0;
    }

    .value {
      margin-bottom: 5px;
      font-weight: bold;
    }

    .day {
      margin-top: 5px;
      color: white;
    }

    .pie {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: conic-gradient(
        green 0% 50%,
        orange 50% 80%,
        red 80% 100%
      );
      margin-top: 20px;
    }

    .legend {
      font-size: 14px;
      margin-top: 10px;
    }
  

  @media(max-width: 600px) {
    body {
      padding: 10px;
    }

    h1 {
      font-size: 20px;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }

    .bar-chart {
      height: 150px;
      gap: 5px;
    }

    .bar {
      min-width: 30px;
    }

    .pie {
      width: 100px;
      height: 100px;
    }
}



    
  </style>
</head>
<body>



  <!-- Stats -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Delivery Agents</span>
        <i class="fas fa-motorcycle stat-icon"></i>
      </div>
      <div class="stat-value">2,847</div>
      <div class="stat-change">+12.5% from last month</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Active Menu</span>
        <i class="fas fa-users stat-icon"></i>
      </div>
      <div class="stat-value">34</div>
      <div class="stat-change">+20 clients added</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Tables Booked</span>
        <i class="fas fa-table stat-icon"></i>
      </div>
      <div class="stat-value">100</div>
      <div class="stat-change">+15.3% this month</div>
    </div>

    <div class="stat-card">
      <div class="stat-header">
        <span class="stat-title">Total Staff</span>
        <i class="fas fa-user-check stat-icon"></i>
      </div>
      <div class="stat-value">18</div>
      <div class="stat-change">+3.2% this month</div>
    </div>
  </div>

  <!-- Bar Chart -->
  <h2>Weekly Sales</h2>
  <div class="bar-chart">
    <div class="bar" style="height: 60%;">
      <div class="value">120k</div>
      <div class="day">Mon</div>
    </div>
    <div class="bar" style="height: 80%;">
      <div class="value">160k</div>
      <div class="day">Tue</div>
    </div>
    <div class="bar" style="height: 40%;">
      <div class="value">80k</div>
      <div class="day">Wed</div>
    </div>
    <div class="bar" style="height: 90%;">
      <div class="value">180k</div>
      <div class="day">Thu</div>
    </div>
    <div class="bar" style="height: 100%;">
      <div class="value">200k</div>
      <div class="day">Fri</div>
    </div>
    <div class="bar" style="height: 70%;">
      <div class="value">140k</div>
      <div class="day">Sat</div>
    </div>
    <div class="bar" style="height: 50%;">
      <div class="value">100k</div>
      <div class="day">Sun</div>
    </div>
  </div>

  <!-- Pie Chart -->
  <h2>Order Types</h2>
  <div class="pie"></div>
  <div class="legend">
    <p style="color:green;">Green = Dine-in (50%)</p>
    <p style="color:orange;">Orange = Delivery (30%)</p>
    <p style="color:red;">Red = Takeaway (20%)</p>
  </div>
  @endsection