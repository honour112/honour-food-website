<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Bliss - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/frontdesk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="dashboard-layout">
    <!-- Sidebar Toggle for mobile -->
    <div class="sideicon" id="sidebarToggle" tabindex="0" aria-label="Open sidebar" role="button">
        <i class="fas fa-angle-right"></i>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="logo-section">
            <div class="logo-img">
                <img src="/assets/images/icons/japanese-food (1).png" alt="Logo">
            </div>
            <div class="logo-text">Delice-237</div>
        </div>

        <!-- User Profile -->
        <div class="user-profile">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <h4>{{ Auth::user()->name }}</h4>
                <p>{{ Auth::user()->role }}</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="nav-menu">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>

            <a href="{{ route('ManageMenu') }}" class="nav-item {{ Route::is('ManageMenu') ? 'active' : '' }}">
                <i class="fas fa-cogs"></i>
                Manage Menu
            </a>

            <a href="{{ route('manageusers') }}" class="nav-item {{ Route::is('manageusers') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                Manage Users
            </a>

            <a href="{{ route('reviews') }}" class="nav-item {{ Route::is('reviews') ? 'active' : '' }}">
                <i class="far fa-file-alt"></i>
                Reports
            </a>

            <!-- Quick Actions -->
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
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h1>Admin Dashboard</h1>
                <p>Bistro Bliss Restaurant</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-outline" onclick="location.reload(true);">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                <button class="btn btn-outline">
                    <i class="fas fa-download"></i> Export
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-file-alt"></i> Generate Report
                </button>
            </div>
        </header>

        <!-- Page Content -->
        <section>
            @yield('content')
        </section>
    </main>
</div>

<!-- Sidebar Toggle Script -->
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
