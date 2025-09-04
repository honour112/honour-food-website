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
  <img src="/assets/images/Cuisine.png" alt="Cuisine" />
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
      <a href="{{ route('contact-page') }}">Contact</a>
        </div>
    </div>
        
        <div class="book-table">
          <a href="{{ route('booktable-page') }}" class="active">Book A Table</a>
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
    <!-- Booking Section Start -->

    <section class="booking-section">
      <div class="booking-map-bg">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537363155047!3d-37.81627974202198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f8e7fb%3A0x5045675218ce6e0!2s123%20Bridge%20St%2C%20Nowhere%20Land%2C%20LA%2012345%2C%20United%20States!5e0!3m2!1sen!2sng!4v1692460800000!5m2!1sen!2sng" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
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
      <div class="booking-header">
        <h1>Book a Table</h1>
        <p>Reserve your spot for an unforgettable dining experience. Please fill out the form below to book your table.</p>
      </div>
      <form class="booking-form" action="{{ route('booktable-page') }}" method="POST">
      @csrf
        <div class="form-row">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Email Address" required>
        </div>
        <div class="form-row">
          <input type="tel" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-row">
          <select name="people" required>
            <option value="" disabled selected>Number of Guests</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6+">6+</option>
          </select>
          <div style="display:flex;flex-direction:column;flex:1;gap:0.3em;">
            <label for="date" style="font-size:0.95em;color:#333;">Reservation Date
              <input type="date" id="date" name="date" required>
            </label>
            <small style="color:#666;">Select the date you want to book your table for.</small>
          </div>
          <div style="display:flex;flex-direction:column;flex:1;gap:0.3em;">
            <label for="time" style="font-size:0.95em;color:#333;">Reservation Time
              <input type="time" id="time" name="time" required>
            </label>
            <small style="color:#666;">Choose your preferred arrival time.</small>
          </div>
        </div>
        <div class="form-row">
          <textarea name="requests" rows="3" placeholder="Special Requests (optional)"></textarea>
        </div>
        <button type="submit">Book Table</button>
      </form>
      <div class="contact-info" style="text-align:center;margin-top:2em;">
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
    </body>

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
  <img src="assets/images/Mask group.png" alt="egg" />
  <img src="assets/images/Mask group (2).png" alt="fries" />
  <img src="assets/images/Mask group (4).png" alt="potato" />
  <img src="assets/images/pexels-ash-376464 1.png" alt="pie" />
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <hr>
    <p>Copyright © 2025 Nkwambi Honour Developer. All Rights Reserved</p>
  </div>
</footer>
<!-- Footer Section End -->
