<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;

class Add2CartController extends Controller
{
    // Show Cart Page
    public function Add2Cart()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('Order.add2cart', compact('cart', 'total'));
    }

    // Add MenuItem to Cart (session)
    public function add($id)
    {
        $menuItem = MenuItem::find($id);
        if (!$menuItem) {
            return redirect()->back()->with('error', 'Item not found!');
        }

        $cart = session()->get('cart', []);

        // If item already in cart, increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'menu_item_id' => $menuItem->id,
                'name' => $menuItem->name,
                'price' => $menuItem->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('add2cart')->with('success', 'Item added to cart!');
    }

    // Update quantities in cart
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int) $quantity); // prevent 0 or negative
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('add2cart')->with('success', 'Cart updated!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('add2cart')->with('success', 'Item removed from cart!');
    }

    // Checkout & save orders in DB
    public function checkout(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'location'       => 'nullable|string|max:500',
            'email'          => 'nullable|email|max:255',
            'payment_method' => 'required|string'
        ]);

        $cart = session()->get('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->route('add2cart')->with('error', 'Cart is empty');
        }

        // Calculate total
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Create Order
        $order = Order::create([
            'customer_name'  => $request->name,
            'phone'          => $request->phone,
            'location'       => $request->location,
            'email'          => $request->email,
            'payment_method' => $request->payment_method,
            'total'          => $total,
            'order_status'   => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Create Order Details via relationship
        foreach ($cart as $item) {
            $order->details()->create([
                'menu_item_id' => $item['menu_item_id'],
                'item_name'    => $item['name'],
                'unit_price'   => $item['price'],
                'quantity'     => $item['quantity'],
                'line_total'   => $item['price'] * $item['quantity'],
            ]);
        }

        // Clear Cart
        session()->forget('cart');

        return redirect()->route('add2cart')->with('order_success', 'Your order has been placed successfully you will receive a mail once it has been processed!');
    }
}
