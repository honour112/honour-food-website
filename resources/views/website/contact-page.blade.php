
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
      <a href="{{ route('review-page') }}">Review</a>
      <a href="{{ route('contact-page') }}" class="active">Contact</a>
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
<!--contact start -->
 <section class="contact-section">
  <div class="contact-map-bg">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537363155047!3d-37.81627974202198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f8e7fb%3A0x5045675218ce6e0!2s123%20Bridge%20St%2C%20Nowhere%20Land%2C%20LA%2012345%2C%20United%20States!5e0!3m2!1sen!2sng!4v1692460800000!5m2!1sen!2sng" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <!-- Contact Heading -->
  <div class="contact-header">
    <h1>Contact Us</h1>
    <p>
      We consider all the drivers of change gives you the components you need to change
      to create a truly happens.
    </p>
  </div>

  <!-- Contact Form -->
  <form class="contact-form">
    <div class="form-row">
      <input type="text" placeholder="Enter your name" name="name">
      <input type="email" placeholder="Enter email address" name="email">
    </div>

    <div class="form-row">
      <input type="text" placeholder="Write a subject" name="subject">
    </div>

    <div class="form-row">
      <textarea placeholder="Write your message" name="message"></textarea>
    </div>

    <button type="submit">Send</button>
  </form>

  <!-- Contact Info -->
  <div class="contact-info">
    <div class="info-box">
      <h4>Call Us:</h4>
      <p class="highlight">+1-234-567-8900</p>
    </div>
    <div class="info-box">
      <h4>Hours:</h4>
      <p>Mon–Fri: 11am – 8pm</p>
      <p>Sat, Sun: 9am – 10pm</p>
    </div>
    <div class="info-box">
      <h4>Our Location:</h4>
      <p>123 Bridge Street</p>
      <p>Nowhere Land, LA 12345</p>
      <p>United States</p>
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
