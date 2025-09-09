<!-- Hamburger icon for mobile sidebar toggle -->
<div class="sideicon" id="sidebarToggle" tabindex="0" aria-label="Open sidebar" role="button">
    <i class="fas fa-angle-right"></i>
</div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- Logo Section -->
    <div class="logo-section">
        <div class="logo-img">
            <img src="{{ asset('assets/images/icons/japanese-food (1).png') }}" alt="">
        </div>
        <div class="logo-text">Bistro Bliss</div>
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

    <!-- Navigation menu -->
    <nav class="nav-menu">
        <a href="{{ route('dashboard') }}" class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </a>

        <a href="{{ route('manageorders') }}" class="nav-item {{ Route::is('manageorders') ? 'active' : '' }}">
            <i class="fas fa-cogs"></i>
            Manage Orders
        </a>

        <a href="{{ route('assigndelivery') }}" class="nav-item {{ Route::is('assigndelivery') ? 'active' : '' }}">
            <i class="fas fa-map-marker-alt"></i>
            Assign Delivery Agents
        </a>

        <a href="{{ route('managebookings') }}" class="nav-item {{ Route::is('managebookings') ? 'active' : '' }}">
            <i class="fas fa-table stat-icon"></i>
            Manage Bookings
        </a>

        <a href="{{ route('reviews') }}" class="nav-item {{ Route::is('reviews') ? 'active' : '' }}">
            <i class="far fa-file-alt"></i>
            Reviews & Complaints
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

        <!-- Secure Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sign-out">
                <i class="fas fa-sign-out-alt"></i>
                Sign Out
            </button>
        </form>
    </div>
</aside>
