<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delice 237 | Your Cart</title>
    <link rel="stylesheet" href="/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Modern Order Type Toggle Styling */
        .order-type-toggle { display: flex; gap: 10px; margin-bottom: 20px; }
        .type-box { 
            flex: 1; border: 2px solid #eee; padding: 15px; border-radius: 12px; 
            cursor: pointer; text-align: center; transition: 0.3s; color: #888;
        }
        .type-box i { display: block; font-size: 20px; margin-bottom: 5px; }
        .type-box.active { border-color: #ffcc00; background: #fffdf0; color: #222; }
        .type-box input { display: none; }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-left">
                <h1> 
                 <img src="/assets/images/icons/japanese-food (1).png" alt="Logo" class="logo">Delice 237</h1>
            </div>
            <a href="{{ route('menu-page') }}" class="nav-btn">
                <i class="fa-solid fa-utensils"></i> Continue Shopping
            </a>
        </header>

        <div class="main-content">
            @if($cart && count($cart) > 0)
            <div id="cart-section" class="section cart-container">
                <div class="cart-header">
                    <h2><i class="fas fa-shopping-bag"></i> Shopping Cart</h2>
                    <span class="cart-count">{{ count($cart) }} items</span>
                </div>

                @if(session('success'))
                    <div class="cart-alert cart-alert-good"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
                @endif

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
                                        <a href="{{ route('cart.remove', ['id' => $id]) }}" class="cart-drop"><i class="fa-solid fa-trash"></i></a>
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
                        <button type="submit" class="btn-cart btn-cart-main"><i class="fa-solid fa-rotate-right"></i> Update</button>
                        <button type="button" id="checkout-toggle" class="btn-cart btn-cart-pass"><i class="fa-solid fa-cash-register"></i> Checkout</button>
                    </div>
                </form>
            </div>
            @else
                <div class="cart-empty">
                    <i class="fas fa-shopping-bag"></i>
                    <p>{{ session('order_success') ?? 'Your cart is empty' }}</p>
                    <a href="{{ route('menu-page') }}" class="submit-btn" style="text-decoration:none; display:inline-block; margin-top:10px;">Order Again</a>
                </div>
            @endif

            <div id="checkout-section" class="section checkout-container" style="display:none;">
                <div class="checkout-header">
                    <button id="back-btn" class="back-btn"><i class="fas fa-arrow-left"></i></button>
                    <h2>Checkout</h2>
                    <div class="secure-badge"><i class="fas fa-lock"></i> Secure</div>
                </div>

                <form action="{{ route('checkout') }}" method="POST" class="checkout-form">
                    @csrf
                    <div id="step-1" class="form-step active">
                        <h3>Delivery or In-house?</h3>
                        
                        <div class="order-type-toggle">
                            <label class="type-box active" id="btn-delivery">
                                <input type="radio" name="order_type" value="delivery" checked onclick="toggleMode('delivery')">
                                <i class="fa-solid fa-truck"></i> Delivery
                            </label>
                            <label class="type-box" id="btn-inhouse">
                                <input type="radio" name="order_type" value="inhouse" onclick="toggleMode('inhouse')">
                                <i class="fa-solid fa-chair"></i> In-house
                            </label>
                        </div>

                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="text" name="phone" placeholder="Phone (Momo/Orange)" required>
                        <textarea name="location" id="loc-field" placeholder="Delivery Address (Street, Building...)" required></textarea>
                        <input type="email" name="email" placeholder="Email (optional)">
                        
                        <button type="button" id="next-btn" class="submit-btn">Continue to Payment</button>
                    </div>

                    <div id="step-2" class="form-step" style="display:none;">
                        <h3>Payment Method</h3>
                        <div class="summary-line" style="margin-bottom: 20px; background: #f9f9f9; padding: 10px; border-radius: 8px;">
                            <span>Total Due:</span>
                            <strong>{{ number_format($total, 0, ',', '.') }} FCFA</strong>
                        </div>
                        
                        <select name="payment_method" required>
                            <option value="Mobile Money">Mobile Money</option>
                            <option value="Cash on Delivery">Cash / Pay at Counter</option>
                        </select>
                        <div class="form-actions">
                            <button type="button" id="prev-btn" class="outline-btn">Back</button>
                            <button type="submit" class="submit-btn">Confirm Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const checkoutToggle = document.getElementById('checkout-toggle');
        const cartSection = document.getElementById('cart-section');
        const checkoutSection = document.getElementById('checkout-section');
        const backBtn = document.getElementById('back-btn');
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');

        // Toggle Checkout Visibility
        checkoutToggle?.addEventListener('click', () => {
            cartSection.style.display = 'none';
            checkoutSection.style.display = 'block';
        });

        backBtn?.addEventListener('click', () => {
            checkoutSection.style.display = 'none';
            cartSection.style.display = 'block';
        });

        // Step Navigation
        nextBtn?.addEventListener('click', () => {
            if(document.getElementsByName('name')[0].value === "" || document.getElementsByName('phone')[0].value === "") {
                alert("Please fill in your name and phone.");
                return;
            }
            step1.style.display = 'none';
            step2.style.display = 'block';
        });

        prevBtn?.addEventListener('click', () => {
            step2.style.display = 'none';
            step1.style.display = 'block';
        });

        // Order Type Toggle Logic
        function toggleMode(type) {
            const delBox = document.getElementById('btn-delivery');
            const inhBox = document.getElementById('btn-inhouse');
            const locField = document.getElementById('loc-field');

            if(type === 'delivery') {
                delBox.classList.add('active');
                inhBox.classList.remove('active');
                locField.placeholder = "Delivery Address (Street, Building...)";
            } else {
                inhBox.classList.add('active');
                delBox.classList.remove('active');
                locField.placeholder = "Table Number (e.g. Table 05)";
            }
        }
    </script>
</body>
</html>