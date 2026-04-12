<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bistro Bliss - Front Desk Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&family=Rufina:wght@400;700&family=Racing+Sans+One:wght@400&family=Radio+Canada:wght@300;400;500;600;700&family=Sansation:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/frontdesk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Hidden Google Element */
        #google_translate_element {
            display: none !important;
        }
        
        /* Clean up Google's automatic top bar */
        body { top: 0 !important; }
        .goog-te-banner-frame { display: none !important; }
        .skiptranslate { display: none !important; }

        /* Styling for our custom toggle buttons */
        .lang-btn {
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="dashboard-layout">
    @include('frontdesk.sidebar')

    <main class="main-content">
        <header class="header">
            <div class="header-left">
                <h1>front desk dash board</h1>
                <p>Bistro bliss restaurant</p>
            </div>
            
            <div class="header-actions">
                <button class="btn btn-outline" onclick="location.reload(true);">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>

                <button class="btn btn-outline lang-btn" onclick="changeLanguage('en')">
                    EN
                </button>
                <button class="btn btn-outline lang-btn" onclick="changeLanguage('fr')">
                    FR
                </button>

                <div id="google_translate_element"></div>
            </div>
        </header>

        @yield('content')
    </main>
</div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,fr',
            autoDisplay: false
        }, 'google_translate_element');
    }

    // This function finds the hidden Google dropdown and forces a click on the right language
    function changeLanguage(langCode) {
        var select = document.querySelector('#google_translate_element select');
        if (select) {
            select.value = langCode;
            // Trigger the change event so Google knows to translate
            select.dispatchEvent(new Event('change'));
        }
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var sidebar = document.getElementById('sidebar');
        
        if(sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
        }
    });
</script>

</body>
</html>