<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>restaurant</title>
  <link rel="stylesheet" href="/assets/css/index.css" />


<style>
    /* --- 1. THE BLUR OVERLAY --- */
    /* This element covers the screen and blurs the background when a card is clicked */
    #menu-blur-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(12px); /* High quality blur */
      display: none; /* Hidden by default */
      z-index: 998;
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    /* --- 2. GRID & SECTION STYLING --- */
    .menu-section {
      text-align: center;
      padding: 60px 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 30px;
      padding: 20px 0;
    }

    /* --- 3. THE CARD DESIGN --- */
    .menu-cards {
      background-color: white;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.06);
      overflow: hidden;
      transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1); /* Premium bouncy effect */
      text-align: center;
      padding: 20px;
      cursor: pointer;
      position: relative;
      border: 1px solid #eee;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* --- 4. ICON-ONLY CART BUTTON (Your UI Style) --- */
    .button-container {
      position: absolute;
      top: 40%; /* Positioned over the food image */
      left: 50%;
      transform: translate(-50%, -50%) scale(0.8);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 10;
    }

    /* Trigger hover state on the card */
    .menu-cards:hover .button-container {
      opacity: 1;
      visibility: visible;
      transform: translate(-50%, -50%) scale(1);
    }

    /* Your custom button adjusted for icon-only */
    .button {
      --width: 50px; /* Square for icon only */
      --height: 50px;
      --tooltip-height: 35px;
      --tooltip-width: 100px;
      --gap-between-tooltip-to-button: 15px;
      --button-color: #AD343E;
      width: var(--width); height: var(--height);
      background: var(--button-color);
      position: relative;
      border-radius: 50%; /* Circle shape */
      border: none;
      box-shadow: 0 4px 15px rgba(173, 52, 62, 0.4);
    }

    /* Tooltip styling */
    .button::before {
      position: absolute; content: attr(data-tooltip);
      width: var(--tooltip-width); height: var(--tooltip-height);
      background-color: #333; font-size: 0.8rem; color: #fff;
      border-radius: 0.25em; line-height: var(--tooltip-height);
      bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
      left: calc(50% - var(--tooltip-width) / 2);
    }
    .button::after {
      position: absolute; content: ""; width: 0; height: 0;
      border: 10px solid transparent; border-top-color: #333;
      left: calc(50% - 10px); bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
    }
    .button::after, .button::before { opacity: 0; visibility: hidden; transition: all 0.5s; }

    /* Centering the icon */
    .button-wrapper, .icon {
      position: absolute; width: 100%; height: 100%;
      left: 0; top: 0; display: flex; align-items: center; justify-content: center;
      color: #fff;
    }

    .button:hover:before, .button:hover:after { opacity: 1; visibility: visible; }
    .button:hover:before { bottom: calc(var(--height) + var(--gap-between-tooltip-to-button)); }
    .button:hover:after { bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px); }

    /* --- 5. VISUAL ELEMENTS --- */
    .menu-img {
      width: 100%; height: 210px;
      object-fit: cover; border-radius: 20px;
      transition: transform 0.5s ease;
    }
    .menu-cards:hover .menu-img { transform: scale(1.03); }
    .menu-name { font-size: 1.4rem; margin-top: 15px; font-weight: 700; color: #333; }
    .menu-price { font-weight: 800; color: #AD343E; font-size: 1.25rem; margin: 5px 0; }

    /* --- 6. POP-UP (MODAL) LOGIC --- */
    .menu-desc, .menu-actions, .close-pop {
      max-height: 0; opacity: 0; overflow: hidden;
      transition: all 0.4s ease; margin: 0;
    }

    /* THE POPPED STATE: Card centers on screen */
    .menu-cards.popped {
      position: fixed;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%) scale(1);
      width: 90%; max-width: 480px;
      z-index: 1000; /* Above overlay */
      background: white; padding: 35px;
      box-shadow: 0 30px 60px rgba(0,0,0,0.4);
      cursor: default;
    }

    /* Content changes when popped */
    .menu-cards.popped .menu-img { height: 300px; border-radius: 20px; }
    .menu-cards.popped .menu-desc, 
    .menu-cards.popped .menu-actions, 
    .menu-cards.popped .close-pop {
      max-height: 600px; opacity: 1; margin-top: 18px;
    }

    /* Keep Cart Button Visible in Pop-up but repositioned or styled if desired */
    .menu-cards.popped .button-container {
      top: 30px; right: 30px; left: auto; transform: scale(1.1);
      opacity: 1; visibility: visible;
    }

    .whatsapp-order-btn {
      background-color: #25D366;
      color: white; padding: 14px 35px;
      border-radius: 50px; text-decoration: none;
      font-weight: 700; display: inline-flex;
      align-items: center; gap: 10px; transition: 0.3s;
    }
    .whatsapp-order-btn:hover { background-color: #128C7E; transform: translateY(-2px); }

    .close-pop {
      background: #f8f8f8; border: none;
      padding: 10px 20px; border-radius: 12px;
      color: #999; font-weight: 600; cursor: pointer;
      margin-top: 25px; transition: 0.2s;
    }
    .close-pop:hover { color: #AD343E; background: #ffebee; }

    /* MOBILE ADJUSTMENTS */
    @media (max-width: 600px) {
      .menu-grid { grid-template-columns: 1fr; }
      .button-container { opacity: 1; visibility: visible; transform: translate(-50%, -50%) scale(0.9); }
    }
    
  </style>


</head>
<body>
  <!-- Navigation Bar  header-->
    
  <nav class="navbar">
    <!-- logo -->
    <div class="logo">
     <img src="/assets/images/japanese-food (1).png" alt="Logo" />
      <div class="Cuisine">
      <div class="logotext">Delice-237</div>
      </div>
    </div>
    <!-- Add overlay div for mobile navigation -->
<div class="overlay" id="overlay">

    <!-- navigation links -->
        <div class="navigation" id="nav-links">
      <a href="{{ route('home-page') }}" >Home</a>
      <a href="{{ route('about-page') }}">About</a>
      <a href="{{ route('menu-page') }}"class="active">Menu</a>
      <a href="{{ route('review-page') }}">Review</a>
      <a href="{{ route('contact-page') }}" >Contact</a>
      <!-- <a href="{{ route('Loginform') }}">Dashboard</a> -->
        </div>
    </div>
        
        <div class="book-table">
          <a href="{{ route('booktable-page') }}">Book A Table</a>
        </div>
   
    
   
   <!-- Hamburger Menu Icon -->
<img 
  src="/assets/images/newham.png" 
  alt="Menu" 
  class="hamburger-icon" 
  id="hamburger-button"
/>

    <!-- Book a Table button -->
    </nav>
    <!--ending of  navigation-->
    <!-- Hero Section -->
  

    <!-- Menu Section -->

<body>
  <div id="menu-blur-overlay"></div>

  <section class="menu-section">
    <h1 class="menu-title">Our Menu</h1>
    
    <div class="menu-filters">
      <button class="filter-btn active" data-category="all">All Items</button>
      @foreach($menuItems->pluck('category')->unique() as $cat)
        <button class="filter-btn" data-category="{{ strtolower($cat) }}">{{ $cat }}</button>
      @endforeach
    </div>

    <div class="menu-grid">
      @foreach($menuItems as $item)
        <div class="menu-cards" data-category="{{ strtolower($item->category) }}">
          
          <img src="{{ asset($item->image_url) }}" alt="{{ $item->name }}" class="menu-img" />

          <div class="button-container">
                <a href="{{ route('add2cart.add', $item->id) }}" 
                class="add-to-cart-btn"
               style="text-decoration: none;">
              <div class="button" data-tooltip="{{ number_format($item->price, 0, ',', '.') }} FCFA">
                <div class="button-wrapper">
                  <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                    </svg>
                  </span>
                </div>
              </div>
            </a>
          </div>

          <div class="menu-name">{{ $item->name }}</div>
          <div class="menu-price">{{ number_format($item->price, 0, ',', '.') }} FCFA</div>

          <div class="menu-desc">{{ $item->description }}</div>

          <div class="menu-actions">
            <a href="#" class="whatsapp-order-btn"
               data-name="{{ $item->name }}"
               data-price="{{ number_format($item->price, 0, ',', '.') }}">
              <i class="fa-brands fa-whatsapp"></i> Order via WhatsApp
            </a>
            <br>
            <button class="close-pop">Close Details</button>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuCards = document.querySelectorAll(".menu-cards");
      const blurOverlay = document.getElementById("menu-blur-overlay");
      const filterBtns = document.querySelectorAll(".filter-btn");

      // Function to close any active pop-up
      const closeActivePop = () => {
        menuCards.forEach(c => c.classList.remove("popped"));
        blurOverlay.style.opacity = "0";
        setTimeout(() => { blurOverlay.style.display = "none"; }, 400);
      };

            // 1. POP-UP TRIGGER LOGIC
            menuCards.forEach(card => {
              card.addEventListener("click", function(e) {
                // If clicking the Add to Cart link or WhatsApp button, do nothing (let natural link work)
              if (
        e.target.closest('.button-container') ||
        e.target.closest('.whatsapp-order-btn') ||
        e.target.closest('a') ||
        e.target.closest('button') ||
        e.target.closest('.language-float-wrapper')
      ) return;
      // ADD TO CART LOADER
          document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
              showLoader();
            });
          });

          // If clicking the Close button
          if (e.target.classList.contains('close-pop')) {
            closeActivePop();
            return;
          }

          // Trigger the Pop-up state
          this.classList.add("popped");
          blurOverlay.style.display = "block";
          setTimeout(() => { blurOverlay.style.opacity = "1"; }, 10);
        });
      });

      // Close on background overlay click
      blurOverlay.addEventListener("click", closeActivePop);

      // 2. FILTERING LOGIC
      filterBtns.forEach(btn => {
        btn.addEventListener("click", () => {
          filterBtns.forEach(b => b.classList.remove("active"));
          btn.classList.add("active");
          const cat = btn.dataset.category;

          menuCards.forEach(card => {
            if (cat === "all" || card.dataset.category === cat) {
              card.style.display = "flex";
            } else {
              card.style.display = "none";
              card.classList.remove("popped");
            }
          });
        });
      });

      // 3. WHATSAPP REDIRECT SCRIPT
      document.querySelectorAll('.whatsapp-order-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const msg = `Hello Delice-237! 👋%0A%0AI would like to order: ${this.dataset.name}%0APrice: ${this.dataset.price} FCFA`;
          window.open(`https://wa.me/678399177?text=${msg}`, '_blank');
        });
      });
    });
  </script>
  <div id="global-loader" class="loader-overlay">
    <div class="loader-content">
      <div class="spinner"></div>
      <p>Please wait...</p>
    </div>
  </div>

  <div class="language-float-wrapper">
    <div class="toggle-button-cover">
      <div id="button-lang" class="button-language ">
        <input class="checkbox" type="checkbox" id="lang-checkbox" onchange="toggleLanguage(this)">
        <div class="knobs"></div>
        <div class="layer"></div>
      </div>
    </div>
  </div>

  <div id="google_translate_element" style="display:none;"></div>

  <script type="text/javascript">
    // 1. Initialize Google Translate
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,fr',
        autoDisplay: false
      }, 'google_translate_element');
    }

    // 2. Optimized Loader Functions
    function showLoader() {
  const loader = document.getElementById('global-loader');
  if (loader) {
    loader.classList.add('loader-visible');
    document.body.style.pointerEvents = 'none';
  }
}

function hideLoader() {
  const loader = document.getElementById('global-loader');
  if (loader) {
    loader.classList.remove('loader-visible');
    document.body.style.pointerEvents = 'auto';
  }
}
    // 3. Language Toggle - This fixes the button!
    function toggleLanguage(checkbox) {
      showLoader(); 
      
      const lang = checkbox.checked ? 'fr' : 'en';
      const selectField = document.querySelector('.goog-te-combo');
      
      if (selectField) {
        selectField.value = lang;
        selectField.dispatchEvent(new Event('change'));
        localStorage.setItem('selectedLanguage', lang);
      }
      
      // Hide loader after a quick blink
      setTimeout(hideLoader, 500); 
    }

    // 4. Memory: Auto-apply language on load
    function applyStoredLanguage() {
      const storedLang = localStorage.getItem('selectedLanguage');
      const checkbox = document.getElementById('lang-checkbox');

      const checkInterval = setInterval(() => {
        const selectField = document.querySelector('.goog-te-combo');
        if (selectField) {
          clearInterval(checkInterval);
          if (storedLang) {
            if (checkbox) checkbox.checked = (storedLang === 'fr');
            if (selectField.value !== storedLang) {
              selectField.value = storedLang;
              selectField.dispatchEvent(new Event('change'));
            }
          }
        }
      }, 100);
      setTimeout(() => clearInterval(checkInterval), 5000);
    }

    window.addEventListener('load', applyStoredLanguage);
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
  
 
</html>

<!-- Footer Section Start -->

<footer class="footer">
  <div class="footer-container">
    <!-- Left: Logo & Description -->
    <div class="footer-brand">
      <div class="footer-logo-row">
  <img src="/assets/images/japanese-food (2).png" alt="Bistro Bliss Logo" class="footer-logo" />
        <span class="footer-brand-name">Delice237</span>
      </div>
      <p class="footer-desc">
        In the new era of technology we look a<br>
        in the future with certainty and pride to<br>
        for our company and.
      </p>
      <div class="footer-socials">
  <a href="#"><img src="/assets/images/1 (1).png" alt="Twitter" /></a>
  <a href="#"><img src="/assets/images/2.png" alt="Facebook" /></a>
  <a href="#"><img src="/assets/images/3.png" alt="Instagram" /></a>
  <a href="#"><img src="/assets/images/4.png" alt="GitHub" /></a>
      </div>
    </div>
    <!-- Center: Pages & Utility Pages -->
    <div class="footer-links">
      <div>
        <h4>Pages</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="../pages/About.html">About</a></li>
          <li><a href="../pages/Menu.html">Menu</a></li>
          <li><a href="../pages/Pricing.html">Pricing</a></li>
          <li><a href="../pages/Blog.html">Blog</a></li>
          <li><a href="../pages/Contact.html">Contact</a></li>
          <li><a href="../pages/Delivery.html">Delivery</a></li>
        </ul>
      </div>
      <div>
        <h4>Utility Pages</h4>
        <ul>
          <li><a href="#">Start Here</a></li>
          <li><a href="#">Styleguide</a></li>
          <li><a href="#">Password Protected</a></li>
          <li><a href="#">404 Not Found</a></li>
          <li><a href="#">Licenses</a></li>
          <li><a href="#">Changelog</a></li>
          <li><a href="#">View More</a></li>
        </ul>
      </div>
    </div>
    <!-- Right: Instagram Images -->
    <div class="footer-instagram">
      <h4>Follow Us On Instagram</h4>
      <div class="footer-insta-grid">
  <img src="assets\images\NewImages\eru.jpg" alt="egg" />
  <img src="assets\images\NewImages\katikati.jpg" alt="fries" />
  <img src="assets\images\NewImages\ndole.jpg" alt="potato" />
  <img src="assets\images\NewImages\Meatpie.jpg" alt="pie" />
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <hr>
    <p>Copyright © 2025 Nkwambi Honour Developer. All Rights Reserved</p>
  </div>
</footer>
<!-- Footer Section End -->
