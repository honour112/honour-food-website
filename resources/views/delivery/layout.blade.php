<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Bliss - Delivery Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&family=Rufina:wght@400;700&family=Racing+Sans+One:wght@400&family=Radio+Canada:wght@300;400;500;600;700&family=Sansation:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/frontdesk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="dashboard-layout">
    <!-- Hamburger icon for mobile sidebar toggle -->
    <div class="sideicon" id="sidebarToggle" tabindex="0" aria-label="Open sidebar" role="button">
        <i class="fas fa-angle-right"></i>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo Section -->
        <div class="logo-section">
            <div class="logo-img">
                <img src="assets/images/icons/japanese-food (1).png" alt="">
            </div>
            <div class="logo-text">Delice-237</div>
        </div>

        <!-- User Profile -->
        <div class="user-profile">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="user-info">
                <h4>{{ Auth::user()->name }}</h4>
                <p>{{ ucfirst(Auth::user()->role) }}</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="nav-menu">
            <a href="{{ route('delivery-dashboard') }}" class="nav-item {{ Route::is('delivery-dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>

            <a href="{{ route('delivery.assignedOrders') }}" class="nav-item {{ Route::is('delivery.assignedOrders') ? 'active' : '' }}">
                <i class="fas fa-cogs"></i>
                Assigned Orders
            </a>

            <a href="{{ route('delivery.status') }}" class="nav-item {{ Route::is('delivery.status') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                My Status
            </a>

            <a href="{{ route('reviews') }}" class="nav-item {{ Route::is('reviews') ? 'active' : '' }}">
                <i class="far fa-file-alt"></i>
                Reports
            </a>

            <!-- Quick Actions Section -->
            <div class="nav-section">
                <div class="nav-section-title">Quick Actions</div>
                <a href="#" class="nav-item">
                    <i class="far fa-bell"></i>
                    Notifications
                    <span class="notification-badge">8</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="far fa-question-circle"></i>
                    Help & Support
                </a>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <p>Signed in as</p>
            <p class="user-name">{{ Auth::user()->name }}</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sign-out">
                    <i class="fas fa-sign-out-alt"></i>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                <p>Bistro Bliss Restaurant - Delivery Dashboard</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-outline" onclick="location.reload(true);">
                    <i class="fas fa-sync-alt"></i>
                    Refresh
                </button>
                <button class="btn btn-outline">
                    <i class="fas fa-download"></i>
                    Export
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-file-alt"></i>
                    Generate Report
                </button>
            </div>
        </header>

        @yield('content')
    </main>
</div>

<!-- Sidebar toggle script for mobile view -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var sidebar = document.getElementById('sidebar');
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
        });
        sidebarToggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                sidebar.classList.toggle('open');
            }
        });
    });
</script>

</body>
</html>
