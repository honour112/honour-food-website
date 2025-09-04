
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
      <a href="{{ route('about-page') }}" class="active">About</a>
      <a href="{{ route('menu-page') }}">Menu</a>
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
    <!--ending of  navigation-->
    
    <!--ending of  navigation--><!-- Healthy food section -->
<div class="healthy-container">
  <div class="healthy-img-col">
  <img src="/assets/images/img (2).png" alt="Healthy Food" class="healthy-img" />
  </div>
  <div class="healthy-text-col">
    <h2>We Provide Healthy Food for your Family</h2>
    <p>
      <strong>
        We provide healthy food for your family. Our story began with a vision to create a unique dining experience that merges fine dining, exceptional service, and a vibrant ambiance. Rooted in city's rich culinary culture, we aim to honor our local roots while infusing a global palate.
      </strong>
    </p>
    <p>
      At place, we believe that dining is not just about food, but also about the overall experience. Our staff, renowned for their warmth and dedication, strives to make every visit an unforgettable event.<br>
      <b>(414) 857 - 0107</b><br>
      <b>happytummy@restaurant.com</b><br>
      <b>837 W. Marshall Lane Marshalltown, IA 50158, Los Angeles</b>
    </p>
  </div>
</div>
<!-- Healthy food section ends -->
<!--new section starts-->X
<!-- Hero Banner Section -->
<section class="hero-banner">
  <div class="hero-banner-bg"></div>
  <div class="hero-banner-content">
    
    <video width="100%" controls autoplay loop>
      <source src="/assets/videos/5a8604fe-067a-4b84-bf89-19acdd46ecb1.webm" type="video/webm">
    <source src="/assets/videos/5a8604fe-067a-4b84-bf89-19acdd46ecb1.mp4" type="video/mp4">
  
    Your browser does not support HTML video.
  </video>

    </button>
    <h1>Feel the authentic &amp;<br>original taste from us</h1>
  </div>
</section>

<!-- Features Row -->
<section class="features-row">
  <div class="feature-box">
    <div class="feature-icon">
      <!-- Placeholder icon -->
  <img src="/assets/images/Group (2).png" alt="Multi Cuisine" />
    </div>
    <div class="feature-text">
      <h3>Multi Cuisine</h3>
      <p>In the new era of technology we look in the future with certainty life.</p>
    </div>
  </div>
  <div class="feature-box">
    <div class="feature-icon">
      <!-- Placeholder icon -->
  <img src="/assets/images/Group.png" alt="Easy To Order" />
    </div>
    <div class="feature-text">
      <h3>Easy To Order</h3>
      <p>In the new era of technology we look in the future with certainty life.</p>
    </div>
  </div>
  <div class="feature-box">
    <div class="feature-icon">
      <!-- Placeholder icon -->
  <img src="/assets/images/Group (1).png" alt="Fast Delivery" />
    </div>
    <div class="feature-text">
      <h3>Fast Delivery</h3>
      <p>In the new era of technology we look in the future with certainty life.</p>
    </div>
  </div>
</section>
<!-- Features Row End -->
 <!-- About Section and info -->
  <!-- Info Section Start -->
<section class="info-section">
  <div class="info-container">
    <!-- Left: Text and Stats -->
    <div class="info-content">
      <h2 class="info-title">
        A little information<br>
        for our valuable guest
      </h2>
      <p class="info-desc">
        At place, we believe that dining is not just about food, but also about the overall experience. Our staff, renowned for their warmth and dedication, strives to make every visit an unforgettable event.
      </p>
      <div class="info-stats-grid">
        <div class="info-stat">
          <div class="info-stat-number">3</div>
          <div class="info-stat-label">Locations</div>
        </div>
        <div class="info-stat">
          <div class="info-stat-number">1995</div>
          <div class="info-stat-label">Founded</div>
        </div>
        <div class="info-stat">
          <div class="info-stat-number">65+</div>
          <div class="info-stat-label">Staff Members</div>
        </div>
        <div class="info-stat">
          <div class="info-stat-number">100%</div>
          <div class="info-stat-label">Satisfied Customers</div>
        </div>
      </div>
    </div>
    <!-- Right: Image -->
    <div class="info-image-wrapper">
  <img src="/assets/images/pexels-cottonbro-studio-4252139 1.png" alt="Chef preparing food" class="info-image" />
    </div>
  </div>
</section>
<!-- Info Section End -->
 <!-- Testimonial Section Start -->
<section class="testimonial-section">
  <h2 class="testimonial-title">What Our Customers Say</h2>
  <div class="testimonial-grid">
    <!-- Testimonial 1 -->
    <div class="testimonial-card">
      <div class="testimonial-quote">“The best restaurant”</div>
      <div class="testimonial-text">
        Last night, we dined at place and were simply blown away. From the moment we stepped in, 
        we were enveloped in an inviting atmosphere and greeted with warm smiles.
      </div>
      <div class="testimonial-user">
  <img src="/assets/images/IMG-20250629-WA0047.jpg" alt="nkwambi honour" class="testimonial-avatar">
        <div>
          <div class="testimonial-name">Nkwambi Honour</div>
          <div class="testimonial-location">ngaoundere</div>
        </div>
      </div>
    </div>
    <!-- Testimonial 2 -->
    <div class="testimonial-card">
      <div class="testimonial-quote">“Simply delicious”</div>
      <div class="testimonial-text">
        Place exceeded my expectations on all fronts. The ambiance was cozy and relaxed, making it a perfect venue for our anniversary dinner. Each dish was prepared and beautifully presented.
      </div>
      <div class="testimonial-user">
  <img src="/assets/images/IMG-20250722-WA0133.jpg" alt="Honour Keble" class="testimonial-avatar">
        <div>
          <div class="testimonial-name">Honour Keble</div>
          <div class="testimonial-location">San Diego, CA</div>
        </div>
      </div>
    </div>
    <!-- Testimonial 3 -->
    <div class="testimonial-card">
      <div class="testimonial-quote">“One of a kind restaurant”</div>
      <div class="testimonial-text">
        The culinary experience at place is first to none. The atmosphere is vibrant, the food – nothing short of extraordinary. The food was the highlight of our evening. Highly recommended.
      </div>
      <div class="testimonial-user">
  <img src="/assets/images/WhatsApp Image 2025-07-22 at 10.42.33_570d051f.jpg" alt="Andy Smith" class="testimonial-avatar">
        <div>
          <div class="testimonial-name">Nkwambi Keble</div>
          <div class="testimonial-location">San Francisco, CA</div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="/assets/js/script.js"></script> 
</body>
<!-- Testimonial Section End -->

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
  <img src="/assets/images/Mask group.png" alt="egg" />
  <img src="/assets/images/Mask group (2).png" alt="fries" />
  <img src="/assets/images/Mask group (4).png" alt="potato" />
  <img src="/assets/images/pexels-ash-376464 1.png" alt="pie" />
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <hr>
    <p>Copyright © 2025 Nkwambi Honour Developer. All Rights Reserved</p>
  </div>
</footer>
<!-- Footer Section End -->
