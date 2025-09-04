<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="/assets/css/cart.css">
<style>
    /* Hide checkout by default */
    .cart-checkout { display: none; margin-top: 20px; }
</style>
</head>

<body>
<div class="cart-shell">
    <h1 class="cart-title">
        <i class="fa-solid fa-cart-shopping"></i> Your Cart
    </h1>

    {{-- Success & Error Messages --}}
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
    @if(session('order_success'))
        <div class="cart-alert cart-alert-good">
            <i class="fa-solid fa-circle-check"></i> {{ session('order_success') }}
        </div>
    @endif

    @if($cart && count($cart) > 0)
        {{-- Cart Table --}}
        <form action="{{ route('cart.update') }}" method="POST" class="cart-form">
            @csrf
            <table class="cart-board">
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-burger"></i> Item</th>
                        <th><i class="fa-solid fa-tag"></i> Price</th>
                        <th><i class="fa-solid fa-hashtag"></i> Quantity</th>
                        <th><i class="fa-solid fa-money-bill"></i> Subtotal</th>
                        <th><i class="fa-solid fa-gear"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price'], 0, ',', '.') }} FCFA</td>
                            <td>
                                <input type="number" 
                                       name="quantities[{{ $id }}]" 
                                       value="{{ $item['quantity'] }}" 
                                       min="1"
                                       class="cart-count">
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

            <div class="cart-steps">
                <button type="submit" class="btn-cart btn-cart-main">
                    <i class="fa-solid fa-rotate-right"></i> Update Cart
                </button>
                <a href="{{ route('menu-page') }}" class="btn-cart btn-cart-ghost">
                    <i class="fa-solid fa-utensils"></i> Continue Shopping
                </a>
            </div>
        </form>

        {{-- Cart Total --}}
        <h3 class="cart-total">
            <i class="fa-solid fa-wallet"></i> Total: {{ number_format($total, 0, ',', '.') }} FCFA
        </h3>

        {{-- Checkout Toggle --}}
        <button type="button" id="checkout-toggle" class="btn-cart btn-cart-main">
            <i class="fa-solid fa-cash-register"></i> Proceed to Checkout
        </button>

        {{-- Checkout Form --}}
        <form action="{{ route('checkout') }}" method="POST" class="cart-checkout">
            @csrf
            <h2 class="checkout-title"><i class="fa-solid fa-cash-register"></i> Checkout</h2>

            <label><i class="fa-solid fa-user"></i> Name:</label>
            <input type="text" name="name" class="checkout-field" required>

            <label><i class="fa-solid fa-phone"></i> Phone:</label>
            <input type="text" name="phone" class="checkout-field" required>

            <label><i class="fa-solid fa-location-dot"></i> Location:</label>
            <textarea name="location" class="checkout-field"></textarea>

            <label><i class="fa-solid fa-money-check-dollar"></i> Payment Method:</label>
            <select name="payment_method" class="checkout-field" required>
                <option value="Mobile Money">Mobile Money</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select>

            <label><i class="fa-solid fa-envelope"></i> Email:</label>
            <input type="email" name="email" class="checkout-field">

            <button type="submit" class="btn-cart btn-cart-pass">
                <i class="fa-solid fa-paper-plane"></i> Place Order
            </button>
        </form>
    @endif
</div>

{{-- JS for toggle --}}
<script>
    const toggleBtn = document.getElementById('checkout-toggle');
    const checkoutForm = document.querySelector('.cart-checkout');

    toggleBtn.addEventListener('click', () => {
        checkoutForm.style.display = checkoutForm.style.display === 'block' ? 'none' : 'block';
    });
</script>

</body>
</html>
