<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status | Delice 237</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #ffcc00; --dark: #222; --gray: #666; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fdfdfd; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        
        .status-card { background: white; padding: 50px 30px; border-radius: 24px; box-shadow: 0 15px 35px rgba(0,0,0,0.08); text-align: center; max-width: 480px; width: 90%; border: 1px solid #eee; }
        
        .icon-box { width: 90px; height: 90px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 40px; margin: 0 auto 25px; transition: all 0.5s ease; }
        
        /* State Colors */
        .state-pending { background: #fffdf0; color: var(--primary); border: 2px dashed var(--primary); }
        .state-confirmed { background: #f0fff4; color: #27ae60; border: 2px solid #27ae60; }
        
        h1 { color: var(--dark); font-size: 28px; margin-bottom: 12px; }
        p { color: var(--gray); line-height: 1.6; font-size: 16px; margin-bottom: 30px; }
        
        .order-meta { background: #f8f8f8; padding: 15px; border-radius: 12px; margin-bottom: 30px; display: inline-block; width: 100%; box-sizing: border-box; }
        .order-meta span { display: block; font-size: 14px; color: #888; }
        .order-meta strong { color: var(--dark); font-size: 18px; }

        .btn-return { background: var(--dark); color: var(--primary); padding: 14px 35px; text-decoration: none; border-radius: 10px; font-weight: bold; display: inline-block; transition: 0.3s; }
        .btn-return:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }

        /* Spinner for Pending */
        .pulse { animation: pulse-animation 2s infinite; }
        @keyframes pulse-animation { 0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 204, 0, 0.7); } 70% { transform: scale(1); box-shadow: 0 0 0 15px rgba(255, 204, 0, 0); } 100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 204, 0, 0); } }
    </style>
</head>
<body>

<div class="status-card">
    @php
        // $order is passed from the Controller
        $isPending = ($order->status === 'pending');
        $isDelivery = ($order->order_type === 'delivery');
    @endphp

    @if($isPending)
        <div class="icon-box state-pending pulse">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
        <h1>Verifying Order...</h1>
        <p>Our <strong>Front Desk Agent</strong> is confirming your payment and order details. Please stay on this page; we'll update you in a moment.</p>
    @else
        <div class="icon-box state-confirmed">
            @if($isDelivery)
                <i class="fa-solid fa-motorcycle"></i>
            @else
                <i class="fa-solid fa-utensils"></i>
            @endif
        </div>
        <h1>Order Confirmed!</h1>
        
        @if($isDelivery)
            <p>Your meal is being prepared! Our <strong>delivery agent</strong> will be at your location ({{ $order->location }}) very soon.</p>
        @else
            <p>Thank you for dining at **Delice 237**. Your order for <strong>{{ $order->location }}</strong> is confirmed. A waiter will be with you shortly!</p>
        @endif
    @endif

    <div class="order-meta">
        <span>Order Reference</span>
        <strong>#DEL-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</strong>
    </div>

    <br>
    <a href="{{ route('menu-page') }}" class="btn-return">Back to Menu</a>
</div>

<script>
    // AUTO-REFRESH LOGIC
    // If the order is still pending, refresh the page every 10 seconds 
    // to check if the Front Desk Agent has clicked "Confirm"
    @if($isPending)
        setTimeout(function() {
            window.location.reload();
        }, 10000); 
    @endif
</script>

</body>
</html>