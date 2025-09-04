<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Bliss - Front Desk Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&family=Rufina:wght@400;700&family=Racing+Sans+One:wght@400&family=Radio+Canada:wght@300;400;500;600;700&family=Sansation:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/frontdesk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="dashboard-layout">
    @include('frontdesk.sidebar')

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <h1>front desk dash board</h1>
                    <p>Bistro bliss restaurant</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-outline" onclick="location.reload(true);">
                        <i class="fas fa-sync-alt"></i>
                        Refresh
                    </button>
                    <button class="btn btn-outline" >
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
         </div>
    </div>
<!-- Sidebar toggle script for mobile view -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var sidebar = document.getElementById('sidebar');
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
        });
        // Optional: allow keyboard access
        sidebarToggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                sidebar.classList.toggle('open');
            }
        });
    });
</script>
</div>
