<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>restaurant</title>
  <link rel="stylesheet" href="/assets/css/index.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


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
  <a href="{{ route('menu-page') }}" class="active">Menu</a>
  <a href="{{ route('review-page') }}">Review</a>
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
    <!--ending of  navigation-->    <!--ending of  navigation-->
    <!--navigation ending -->
    <!-- Menu Section -->
<section class="menu-section">
  <h1 class="menu-title">Our Menu</h1>
  <p class="menu-description">
    Explore our delicious offerings!
  </p>

  <div class="menu-filters">
    <button class="filter-btn active">Our specialties</button>
    
  </div>

  <div class="menu-grid">
    @foreach($menuItems as $item)
      <div class="menu-cards">
        <img 
          src="{{ asset($item->image_url) }}" 
          alt="{{ $item->name }}" 
          class="menu-img"
        />
        <div class="menu-price">{{ number_format($item->price, 0, ',', '.') }} fcfa</div>
        <div class="menu-name">{{ $item->name }}</div>
        <div class="menu-desc">{{ $item->description }}</div>
        <!-- Add to Cart Icon -->
         
        <a href="{{ route('add2cart.add', $item->id) }}" class="add-to-cart-icon">
          <i class="fa-solid fa-cart-plus"></i>
          
        </a>
        <h4> Add to cart</h4>
      </div>
      
    @endforeach
  </div>
</section>

<section class="order-section">
  <!-- LEFT SIDE: TEXT -->
  <div class="order-text">
    <h2>You can order<br>through apps</h2>
    <h6>Lorem ipsum dolor sit amet consectetur adipiscing elit enim bibendum sed et aliquet aliquet risus tempor semper.</h6>
  </div>

  <!-- RIGHT SIDE: IMAGES -->
  <div class="order-image">
    <img src="/assets/images/Ggz3Cb0BEY6UU0qb9nb4tKbSPteHfdMdxL9AXG8V.jpg" alt="App Logo 1">
    <img src="/assets/images/OIP.jpeg" alt="App Logo 2">
  </div>
</section>
<script src="/assets/js/script.js"></script> 
</body>
<!-- Order with Section End -->
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
