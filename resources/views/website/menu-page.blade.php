<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delice-237 | Menu</title>
  <link rel="stylesheet" href="/assets/css/index.css" />
  <link rel="stylesheet" href="/assets/css/menu.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>   
<!-- ADDITIONAL STYLE  -->
<style>
.menu-actions {
  display: flex;
  gap: 12px;
  align-items: center;
}

.whatsapp-order-btn {
  color: #25D366;
  font-size: 22px;
}

.whatsapp-order-btn:hover {
  color: #1ebe5d;
}
</style>

<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      <img src="/assets/images/japanese-food (1).png" alt="Logo" />
      <div class="Cuisine">
        <div class="logotext">Delice-237</div>
      </div>
    </div>

    <div class="overlay" id="overlay">
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

    <img src="/assets/images/newham.png" alt="Menu" class="hamburger-icon" id="hamburger-button" />
  </nav>

  <!-- MENU SECTION -->
  <section class="menu-section">
    <h1 class="menu-title">Our Menu</h1>
    <p class="menu-description">Explore our delicious offerings!</p>

    <!-- FILTER BUTTONS -->
    <div class="menu-filters">
      <button class="filter-btn active" data-category="all">All</button>
      @foreach($menuItems->pluck('category')->unique() as $cat)
        <button class="filter-btn" data-category="{{ strtolower($cat) }}">{{ $cat }}</button>
      @endforeach
    </div>

    <!-- MENU GRID -->
    <div class="menu-grid">
      @foreach($menuItems as $item)
        <div class="menu-cards" data-category="{{ strtolower($item->category) }}">
          <img src="{{ asset($item->image_url) }}" alt="{{ $item->name }}" class="menu-img" />
          <div class="menu-price">{{ number_format($item->price, 0, ',', '.') }} FCFA</div>
          <div class="menu-name">{{ $item->name }}</div>
          <div class="menu-desc">{{ $item->description }}</div>

          <div class="menu-actions">
          <a href="{{ route('add2cart.add', $item->id) }}" class="add-to-cart-icon">
            <i class="fa-solid fa-cart-plus"></i>
          </a>

          <a href="#"
            class="whatsapp-order-btn"
            data-name="{{ $item->name }}"
            data-price="{{ number_format($item->price, 0, ',', '.') }}">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </div>

       <h4>Add to cart / Pay</h4>

        </div>
      @endforeach
    </div>
  </section>

  <!-- ORDER SECTION -->
  <section class="order-section">
    <div class="order-text">
      <h2>You can order<br>through apps</h2>
      <h6>Lorem ipsum dolor sit amet consectetur adipiscing elit enim bibendum sed et aliquet.</h6>
    </div>
    <div class="order-image">
      <img src="/assets/images/Ggz3Cb0BEY6UU0qb9nb4tKbSPteHfdMdxL9AXG8V.jpg" alt="App 1">
      <img src="/assets/images/OIP.jpeg" alt="App 2">
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-brand">
        <div class="footer-logo-row">
          <img src="/assets/images/japanese-food (2).png" alt="Bistro Bliss Logo" class="footer-logo" />
          <span class="footer-brand-name">Bistro Bliss</span>
        </div>
        <p class="footer-desc">
          In the new era of technology we look<br>
          in the future with certainty and pride<br>
          for our company.
        </p>
        <div class="footer-socials">
          <a href="#"><img src="/assets/images/1 (1).png" alt="Twitter" /></a>
          <a href="#"><img src="/assets/images/2.png" alt="Facebook" /></a>
          <a href="#"><img src="/assets/images/3.png" alt="Instagram" /></a>
          <a href="#"><img src="/assets/images/4.png" alt="GitHub" /></a>
        </div>
      </div>

      <div class="footer-links">
        <div>
          <h4>Pages</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4>Utility Pages</h4>
          <ul>
            <li><a href="#">Start Here</a></li>
            <li><a href="#">Styleguide</a></li>
            <li><a href="#">404 Not Found</a></li>
            <li><a href="#">Licenses</a></li>
            <li><a href="#">Changelog</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-instagram">
        <h4>Follow Us On Instagram</h4>
        <div class="footer-insta-grid">
          <img src="/assets/images/NewImages/eru.jpg" alt="eru" />
          <img src="/assets/images/NewImages/katikati.jpg" alt="katikati" />
          <img src="/assets/images/NewImages/ndole.jpg" alt="ndole" />
          <img src="/assets/images/NewImages/Meatpie.jpg" alt="meatpie" />
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <hr>
      <p>Copyright © 2025 Nkwambi Honour Developer. All Rights Reserved</p>
    </div>
  </footer>

  <script src="/assets/js/script.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const buttons = document.querySelectorAll(".filter-btn");
      const menuCards = document.querySelectorAll(".menu-cards");

      buttons.forEach(btn => {
        btn.addEventListener("click", () => {
          buttons.forEach(b => b.classList.remove("active"));
          btn.classList.add("active");

          const category = btn.getAttribute("data-category");

          menuCards.forEach(card => {
            const cardCategory = card.getAttribute("data-category");
            if (category === "all" || cardCategory === category) {
              card.style.display = "block";
              card.classList.add("fade-in");
            } else {
              card.style.display = "none";
              card.classList.remove("fade-in");
            }


            
          });
        });
      });
    });
  </script>
  <script>
  document.querySelectorAll('.whatsapp-order-btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();

      const name = this.dataset.name;
      const price = this.dataset.price;

      const message =
        `Hello Delice-237 👋%0A%0A` +
        `I want to order:%0A` +
        `• ${name}%0A` +
        `Price: ${price} FCFA%0A%0A` +
        `Please help me complete payment.`;

      const phone = "678399177";
      const url = `https://wa.me/${phone}?text=${message}`;

      window.open(url, '_blank');
    });
  });
</script>

</body>
</html>
