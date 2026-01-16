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
      <a href="{{ route('home-page') }}" class="active">Home</a>
      <a href="{{ route('about-page') }}">About</a>
      <a href="{{ route('menu-page') }}">Menu</a>
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
  

  <div class="background">
    <div class="HERO">
      <div class="herotxt1">
        <h1>Best food for <br> your taste</h1>
      </div>
      <div class="herotxt2">
        <p>Discover delectable cuisine and unforgettable moments in our welcoming, culinary haven.</p>
      </div>
      <div class="hero-button1">
        <div class="bookable">
          <a href="{{ route('booktable-page') }}">Book A Table</a>
        </div>
        <div class="explore-menu">
          <a href="{{ route('menu-page') }}">Explore Menu</a>
        </div>
      </div>
    </div>
  </div>
  <!--ending of hero section-->
  
<div class="browse-menu">
  <h2>Browse Our Menu</h2>
  <div class="cards">
    <div class="menu-card">
      <div class="menu-icon">
  <img src="/assets/images/icon.png" alt="Breakfast" />
      </div>
      <h3>Breakfast</h3>
      <p>In the new era of technology we look in the future with certainty and pride for our life.</p>
      <a href="{{ route('menu-page') }}"class="explore-link">Explore Menu</a>
    </div>
    <div class="menu-card">
      <div class="menu-icon">
  <img src="/assets/images/icon (1).png" alt="Main Dishes" />
      </div>
      <h3>Main Dishes</h3>
      <p>In the new era of technology we look in the future with certainty and pride for our life.</p>
      <a href="#" class="explore-link">Explore Menu</a>
    </div>
    <div class="menu-card">
      <div class="menu-icon">
  <img src="/assets/images/icon (2).png" alt="Drinks" />
      </div>
      <h3>Drinks</h3>
      <p>In the new era of technology we look in the future with certainty and pride for our life.</p>
      <a href="#" class="explore-link">Explore Menu</a>
    </div>
    <div class="menu-card">
      <div class="menu-icon">
  <img src="/assets/images/icon (4).png" alt="Desserts" />
      </div>
      <h3>Desserts</h3>
      <p>In the new era of technology we look in the future with certainty and pride for our life.</p>
      <a href="#" class="explore-link">Explore Menu</a>
    </div>
  </div>
  <!--ending of  3rd section-->
  <!-- Healthy food section -->
<div class="healthy-container">
  <div class="healthy-img-col">
  <img src="/assets/images/img.png" alt="Healthy Food" class="healthy-img" />
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
    <a href="{{ route('about-page') }}" class="about-btn">More About Us</a>
  </div>
</div>
<!-- Healthy food section ends -->
<!--new section starts-->
  <div class="healthy-food">
    
    <!-- Left: Chef Image -->
    <div class="images">
  <img src="/assets/images/img (1).png" alt="Chef Cooking" class="healthy-chops-img">
    </div>

    <!-- Right: Text + Features -->
    <div class="text">
      <h2>  Fastest Food<br>Delivery in City</h2>
      <h6>
        We understand that when you're hungry, you want your food fast! That's why we pride ourselves
        on our quick delivery service, ensuring that your delicious meals arrive hot and fresh.
      </h6>

      <!-- Features -->
      <div class="features">
        <div class="feature-item">
          <img src="/assets/images/Icon (3).png" alt="Delivery Icon">
          <span>Delivery within 30 minutes</span>
        </div>
        <div class="feature-item">
          <img src="/assets/images/Icon (5).png" alt="Best Offer Icon">
          <span>Best Offer & Prices</span>
        </div>
        <div class="feature-item">
          <img src="/assets/images/Icon (6).png" alt="Online Services Icon">
          <span>Online Services Available</span>
        </div>
      </div>

    </div>
    </div>
    <!-- tESTIMONIAL  Section -->
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
</div>
<!-- Testimonial Section End -->


    <!--Blog Section-->
    <section class="blog-section">
    <div class="blog-header">
    <h2>Our Blog &amp; Articles</h2>
    <a href="#" class="read-all-btn">Read All Articles</a>
    </div>
    <div class="blog-grid">

      <!-- Main Blog Card -->
      <div class="blog-card blog-card--main">
  <img src="assets\images\NewImages\Meatpie.jpg" alt="Burger" class="blog-img">
        <div class="blog-content">
          <span class="blog-date">January 3, 2023</span>
          <h3 class="blog-title">The secret tips &amp; tricks to prepare a perfect burger &amp; pizza for our customers</h3>
          <p class="blog-desc">
           January 3, 2023
           Lorem ipsum dolor sit amet consectetur of a adipiscing elitilmim semper adipiscing massa gravida
           nisi cras enim quis nibholm varius amet gravida ut facilisis neque egestas. 
          </p>
        </div>
      </div>
      <!-- Blog Card 2 -->
      <div class="blog-card">
  <img src="assets\images\NewImages\ndole.jpg" alt="French Fries" class="blog-img">
        <div class="blog-content">
          <span class="blog-date">January 3, 2023</span>
          <h3 class="blog-title">How to prepare the perfect Ndole</h3>
        </div>
      </div>
      <!-- Blog Card 3 -->
      <div class="blog-card">
  <img src="assets\images\NewImages\fufuegusi.jpg" alt="Chicken Tenders" class="blog-img">
        <div class="blog-content">
          <span class="blog-date">January 3, 2023</span>
          <h3 class="blog-title">How to prepare delicious fufu</h3>
        </div>
      </div>
      <!-- Blog Card 4 -->
      <div class="blog-card">
  <img src="assets\images\NewImages\katikati.jpg" alt="Cheesecake" class="blog-img">
        <div class="blog-content">
          <span class="blog-date">January 3, 2023</span>
          <h3 class="blog-title">7 delicious kati kati recipes you can prepare</h3>
        </div>
      </div>
      <!-- Blog Card 5 -->
      <div class="blog-card">
  <img src="assets\images\NewImages\eru.jpg" alt="Pizza" class="blog-img">
        <div class="blog-content">
          <span class="blog-date">January 3, 2023</span>
          <h3 class="blog-title">5 great eru you should visit delice 237</h3>
        </div>
      </div>
    </div>
  </section>
<script src="/assets/js/script.js"></script> 
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
