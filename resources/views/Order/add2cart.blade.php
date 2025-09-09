<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h1> 
                 <img src="/assets/images/icons/japanese-food (1).png" alt="Bistro Bliss Logo" class="logo"> Bistro Bliss</h1>
            </div>
            <a href="{{ route('menu-page') }}" class="nav-btn">
                <i class="fa-solid fa-utensils"></i> Continue Shopping
            </a>
        </header>

        <div class="main-content">
            <!-- CART SECTION -->
            @if($cart && count($cart) > 0)
            <div id="cart-section" class="section cart-container">
                <div class="cart-header">
                    <h2><i class="fas fa-shopping-bag"></i> Shopping Cart</h2>
                    <span class="cart-count">{{ count($cart) }} items</span>
                </div>

                <!-- Success & Error Messages -->
                @if(session('success'))
                    <div class="cart-alert cart-alert-good">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="cart-alert cart-alert-bad">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                    </div>
                @endif

                <!-- Cart Table -->
                <form action="{{ route('cart.update') }}" method="POST" class="cart-form">
                    @csrf
                    <table class="cart-board">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ number_format($item['price'], 0, ',', '.') }} FCFA</td>
                                    <td>
                                        <input type="number" name="quantities[{{ $id }}]" value="{{ $item['quantity'] }}" min="1" class="cart-count">
                                    </td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} FCFA</td>
                                    <td>
                                        <a href="{{ route('cart.remove', ['id' => $id]) }}" class="cart-drop">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-summary">
                        <div class="summary-line">
                            <span>Total</span>
                            <span>{{ number_format($total, 0, ',', '.') }} FCFA</span>
                        </div>
                    </div>

                    <div class="cart-steps">
                        <button type="submit" class="btn-cart btn-cart-main">
                            <i class="fa-solid fa-rotate-right"></i> Update Cart
                        </button>
                        <button type="button" id="checkout-toggle" class="btn-cart btn-cart-pass">
                            <i class="fa-solid fa-cash-register"></i> Proceed to Checkout
                        </button>
                    </div>
                </form>
            </div>
            @else
                <div class="cart-empty">
                    <i class="fas fa-shopping-bag"></i>
                    <p>Your Order Was placed successfully you will receive a mail once it has been processed</p>
                </div>
            @endif

            <!-- CHECKOUT SECTION -->
            <div id="checkout-section" class="section checkout-container" style="display:none;">
                <div class="checkout-header">
                    <button id="back-btn" class="back-btn"><i class="fas fa-arrow-left"></i></button>
                    <h2>Checkout</h2>
                    <div class="secure-badge">
                        <i class="fas fa-lock"></i> Secure checkout
                    </div>
                </div>

                <form action="{{ route('checkout') }}" method="POST" class="checkout-form">
                    @csrf
                    <!-- Step 1 -->
                    <div id="step-1" class="form-step active">
                        <h3>Contact & Delivery Info</h3>
                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="text" name="phone" placeholder="Phone Number" required>
                        <textarea name="location" placeholder="Delivery Address" required></textarea>
                        <input type="email" name="email" placeholder="Email (optional)">
                        <button type="button" id="next-btn" class="submit-btn">Continue to Payment</button>
                    </div>

                    <!-- Step 2 -->
                    <div id="step-2" class="form-step" style="display:none;">
                        <h3>Payment Method</h3>
                        <select name="payment_method" required>
                            <option value="Mobile Money">Mobile Money</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                        </select>
                        <div class="form-actions">
                            <button type="button" id="prev-btn" class="outline-btn">Back</button>
                            <button type="submit" class="submit-btn">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        const checkoutToggle = document.getElementById('checkout-toggle');
        const checkoutSection = document.getElementById('checkout-section');
        const backBtn = document.getElementById('back-btn');
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');

        checkoutToggle?.addEventListener('click', () => {
            checkoutSection.style.display = 'block';
        });

        backBtn?.addEventListener('click', () => {
            checkoutSection.style.display = 'none';
        });

        nextBtn?.addEventListener('click', () => {
            step1.style.display = 'none';
            step2.style.display = 'block';
        });

        prevBtn?.addEventListener('click', () => {
            step2.style.display = 'none';
            step1.style.display = 'block';
        });
    </script>
</body>
</html>
