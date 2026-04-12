<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>restaurant</title>
  <link rel="stylesheet" href="/assets/css/index.css" />

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
      <a href="{{ route('home-page') }}">Home</a>
      <a href="{{ route('about-page') }}">About</a>
      <a href="{{ route('menu-page') }}">Menu</a>
      <a href="{{ route('review-page') }}" class="active">Review</a>
      <a href="{{ route('contact-page') }}">Contact</a>
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
    <!--healthy container for beauty to review page -->
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

     <div class="healthy-container">
  <div class="healthy-img-col">
    <img src="/assets/images/shot-smiling-woman-eating-healthy-food-while-using-her-mobile-phone-home_519356-2819.jpg" alt="Healthy Food" class="healthy-img" />
  </div>

  <div class="healthy-text-col">
    <h2>Leave a Review</h2>
    <p>
      <strong>
        We provide healthy food for your family. Our story began with a vision to create a unique dining 
        experience that merges fine dining, exceptional service, and a vibrant ambiance. Rooted in city's 
        rich culinary culture, we aim to honor our local roots while infusing a global palate. We value your 
        opinion and use you reviews to better our service 
      </strong>
    </p>
    <p>
      At place, we believe that dining is not just about food, but also about the overall experience. Our staff, renowned for their warmth and dedication, strives to make every visit an unforgettable event.<br>
      
    </p>
  </div>
</div>

<!-- @if(session('success')) -->
<!-- <div>{{session('success')}}</div> -->

<!-- @endif -->
<!-- Review Submission Section -->
<section class="review-section">
    <h2>Share Your Experience With Us</h2>
    <div class="review-container">
    <div class="reviewback">

    <form class="review-form" action="{{ route('store-review') }}" method="POST">
      @csrf
      <label for="name">Your Name</label>
      <img src="assets/images/name.webp" alt="logo">
      <input type="text" id="name" name="name" placeholder="Enter your name" required>

      <label for="location">Date</label>
      <img src="/assets/images/R.jpeg" alt="logo">
      <input type="date" id="date" name="date" placeholder="Enter the date" required>
    
      <label for="review">Your Review</label>
      <img src="assets/images/agent-chat-icon-outline-style-vector.jpg" alt="logo">
      <textarea id="review" name="review" rows="5" placeholder="please write your review here..." required></textarea>
       
      <button type="submit">Submit Review</button>
    </form>
    </div>
  </div>
</div>
</section>



  
<script src="/assets/js/script.js"></script> 

  <div id="global-loader" class="loader-overlay">
    <div class="loader-content">
      <div class="spinner"></div>
      <p>Preparing your experience...</p>
    </div>
  </div>

  <div class="language-float-wrapper">
    <div class="toggle-button-cover">
      <div id="button-lang" class="button r">
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
      if (loader) loader.classList.add('loader-visible');
    }

    function hideLoader() {
      const loader = document.getElementById('global-loader');
      if (loader) loader.classList.remove('loader-visible');
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
        <span class="footer-brand-name">Bistro Bliss</span>
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
