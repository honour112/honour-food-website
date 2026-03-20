@extends('Admin.AdminLayout')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

.dashboard{
padding:25px;
}

.dashboard-header{
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
margin-bottom:30px;
}

.dashboard-title{
font-size:28px;
font-weight:700;
color:#2c3e50;
}

.download-btn{
background:#22c55e;
color:white;
padding:10px 18px;
border-radius:8px;
display:flex;
align-items:center;
gap:8px;
text-decoration:none;
font-weight:500;
transition:0.3s;
}

.download-btn:hover{
background:#16a34a;
color:white;
}

.stats-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:30px;
}

.stat-card{
padding:20px;
border-radius:14px;
color:white;
display:flex;
align-items:center;
gap:15px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
transition:0.25s;
}

.stat-card:hover{
transform:translateY(-4px);
}

.stat-icon{
font-size:24px;
background:rgba(255,255,255,0.25);
padding:12px;
border-radius:10px;
}

.stat-info h6{
font-size:13px;
margin:0;
opacity:0.9;
}

.stat-info h3{
margin:4px 0 0 0;
font-weight:700;
}

.orders{background:linear-gradient(135deg,#3b82f6,#1e40af);}
.accepted{background:linear-gradient(135deg,#10b981,#047857);}
.pending{background:linear-gradient(135deg,#f59e0b,#b45309);}
.rejected{background:linear-gradient(135deg,#ef4444,#991b1b);}
.revenue{background:linear-gradient(135deg,#6366f1,#3730a3);}
.customers{background:linear-gradient(135deg,#8b5cf6,#5b21b6);}
.items{background:linear-gradient(135deg,#14b8a6,#0f766e);}
.top{background:linear-gradient(135deg,#f97316,#c2410c);}

.reservation-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-bottom:30px;
}

.reservation-card{
background:white;
padding:25px;
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
text-align:center;
}

.reservation-card i{
font-size:26px;
color:#3b82f6;
margin-bottom:10px;
}

.reservation-card h2{
margin:0;
font-weight:700;
}

.charts-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(420px,1fr));
gap:25px;
margin-bottom:30px;
}

.chart-card{
background:white;
border-radius:14px;
padding:25px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
}

.chart-title{
font-weight:600;
margin-bottom:15px;
color:#374151;
}

.table-card{
background:white;
padding:25px;
border-radius:14px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
margin-bottom:25px;
}

.recommend-card{
background:linear-gradient(135deg,#facc15,#f59e0b);
padding:25px;
border-radius:14px;
color:#78350f;
font-weight:500;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
}

@media(max-width:768px){

.charts-grid{
grid-template-columns:1fr;
}

}

</style>

<div class="dashboard">

<div class="dashboard-header">

<div class="dashboard-title">
Restaurant Analytics
</div>

<a href="{{ route('report.download') }}" class="download-btn">
<i class="fa-solid fa-download"></i>
Download Report
</a>

</div>

<div class="stats-grid">

<div class="stat-card orders">
<div class="stat-icon"><i class="fa-solid fa-receipt"></i></div>
<div class="stat-info">
<h6>Total Orders</h6>
<h3>{{ $totalOrders }}</h3>
</div>
</div>

<div class="stat-card accepted">
<div class="stat-icon"><i class="fa-solid fa-check"></i></div>
<div class="stat-info">
<h6>Accepted Orders</h6>
<h3>{{ $acceptedOrders }}</h3>
</div>
</div>

<div class="stat-card pending">
<div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
<div class="stat-info">
<h6>Pending Orders</h6>
<h3>{{ $pendingOrders }}</h3>
</div>
</div>

<div class="stat-card rejected">
<div class="stat-icon"><i class="fa-solid fa-xmark"></i></div>
<div class="stat-info">
<h6>Rejected Orders</h6>
<h3>{{ $rejectedOrders }}</h3>
</div>
</div>

<div class="stat-card revenue">
<div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
<div class="stat-info">
<h6>Total Revenue</h6>
<h3>{{ number_format($totalRevenue) }} FCFA</h3>
</div>
</div>

<div class="stat-card customers">
<div class="stat-icon"><i class="fa-solid fa-users"></i></div>
<div class="stat-info">
<h6>Customers</h6>
<h3>{{ $uniqueCustomers }}</h3>
</div>
</div>

<div class="stat-card items">
<div class="stat-icon"><i class="fa-solid fa-burger"></i></div>
<div class="stat-info">
<h6>Items Sold</h6>
<h3>{{ $totalItemsSold }}</h3>
</div>
</div>

<div class="stat-card top">
<div class="stat-icon"><i class="fa-solid fa-star"></i></div>
<div class="stat-info">
<h6>Top Item</h6>
<h3>{{ $topItem ? $topItem->name : 'None' }}</h3>
</div>
</div>

</div>

<div class="reservation-grid">

<div class="reservation-card">
<i class="fa-solid fa-calendar-check"></i>
<h5>Reservations</h5>
<h2>{{ $totalReservations }}</h2>
</div>

<div class="reservation-card">
<i class="fa-solid fa-chair"></i>
<h5>Table Bookings</h5>
<h2>{{ $totalBookings }}</h2>
</div>

</div>

<div class="charts-grid">

<div class="chart-card">
<div class="chart-title">Monthly Revenue</div>
<canvas id="salesChart"></canvas>
</div>

<div class="chart-card">
<div class="chart-title">Top Selling Items</div>
<canvas id="itemsChart"></canvas>
</div>

<div class="chart-card">
<div class="chart-title">Peak Ordering Hours</div>
<canvas id="hoursChart"></canvas>
</div>

</div>

<div class="table-card">

<h5 class="mb-3">
<i class="fa-solid fa-crown text-warning"></i>
Top Customers
</h5>

<table class="table">

<thead>
<tr>
<th>Customer</th>
<th>Total Spent</th>
</tr>
</thead>

<tbody>

@foreach($topCustomers as $customer)

<tr>
<td>{{ $customer->customer_name }}</td>
<td>{{ number_format($customer->total_spent) }} FCFA</td>
</tr>

@endforeach

</tbody>

</table>

</div>

<div class="recommend-card">

<i class="fa-solid fa-lightbulb"></i>
{{ $recommendation }}

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const months = @json($months);
const sales = @json($sales);

const topItems = @json($topItems);
const itemSales = @json($itemSales);

const hours = @json($hours);
const orderCounts = @json($orderCounts);


new Chart(document.getElementById('salesChart'),{
type:'line',
data:{
labels:months,
datasets:[{
data:sales,
borderColor:'#3b82f6',
backgroundColor:'rgba(59,130,246,0.15)',
fill:true,
tension:0.4
}]
},
options:{plugins:{legend:{display:false}}}
});


new Chart(document.getElementById('itemsChart'),{
type:'bar',
data:{
labels:topItems,
datasets:[{
data:itemSales,
backgroundColor:'#10b981'
}]
},
options:{plugins:{legend:{display:false}}}
});


new Chart(document.getElementById('hoursChart'),{
type:'bar',
data:{
labels:hours,
datasets:[{
data:orderCounts,
backgroundColor:'#f59e0b'
}]
},
options:{plugins:{legend:{display:false}}}
});

</script>

@endsection
