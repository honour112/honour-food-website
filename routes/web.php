<?php

use App\Http\Controllers\Add2CartController;
use App\Http\Controllers\AdminManagemenuController;
use App\Http\Controllers\BookDashboardController;
use App\Http\Controllers\BookTableController;   
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\ReviewdashboardController;
use App\Http\Controllers\ReviewPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderfrontdeskController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DeliveryController;
use App\Models\Order;
// use app\Http\Controllers\admin\AdminManagemenuController;




// Website Routes
Route::get('/', function () {
    return view('website.home-page');
})->name('home-page');

Route::get('/about', function () {
    return view('website.about-page');
})->name('about-page');

Route::get('/menu', [MenuPageController::class, 'showMenuItems'])->name('menu-page');
Route::get('/review',[ReviewPageController::class,'ReviewPage'])->name('review-page');
Route::post('/review',[ReviewPageController::class,'storeReview'])->name('store-review');

Route::get('/contact', function () {
    return view('website.contact-page');
})->name('contact-page');



Route::get('/booktable', [BookTableController::class, 'booktablePage'])->name('booktable-page');
Route::post('/booktable', [BookTableController::class, 'booktable'])->name('booktable-page');

// Frontdesk Routes
Route::get('/assigndelivery', function () {
    return view('frontdesk.assigndelivery');
})->name('assigndelivery');
Route::get('/sidebar', function () {
    return view('frontdesk.sidebar');
})->name('sidebar');

Route::get('/frontdesk', function () {
    return view('frontdesk.frontdesk-dashboard');
})->name('frontdesk-dashboard');

Route::get('/dashboard', function () {
    return view('frontdesk.dashboard');
})->name('dashboard');

Route::get('/assigndelivery', function () {
    return view('frontdesk.assigndelivery');
})->name('assigndelivery');

Route::get('/managebookings', function () {
    return view('frontdesk.managebookings');
})->name('managebookings');


// Display all orders
Route::get('/frontdesk/orders', [OrderfrontdeskController::class, 'showOrder'])->name('manageorders');

// Accept an order
Route::post('/frontdesk/orders/{id}/accept', [OrderfrontdeskController::class, 'accept'])->name('frontdesk.orders.accept');

// Decline an order
Route::post('/frontdesk/orders/{id}/decline', [OrderfrontdeskController::class, 'decline'])->name('frontdesk.orders.decline');

// Example: Send email for a specific order
Route::get('/send-confirmation/{order}', [OrderConfirmationController::class, 'confirmEmail'])
     ->name('order.confirmation');



// Example: Send email for a specific order
Route::get('/send-confirmation/{order}', [OrderConfirmationController::class, 'confirmEmail'])
     ->name('order.confirmation');




Route::get('/signout', function () {
    return view('frontdesk.signout');
})->name('signout');

Route::get('/reviews', [ReviewdashboardController::class,'index'])->name('reviews');
Route::post('/reviews',[ReviewdashboardController::class,'store'])->name('reviews.store');
Route::delete('/reviews/{id}', [ReviewdashboardController::class, 'destroy'])->name('reviews.destroy');
Route::put('/reviews/{id}', [ReviewdashboardController::class, 'update'])->name('reviews.update');

Route::get('/managebookings', [BookDashboardController::class, 'showBookings'])->name('managebookings');




// ADMIN ROUTES

Route::get('/admin-dashboard', function () {
    return view('Admin.adminsidebar');
})->name('admin-dashboard');
Route::get('/admin-header', function () {
    return view('Admin.AdminHeaderLayout');
})->name('admin-header');

Route::get('/Admindashboard', function () {
    return view('Admin.Admindashboard');
})->name('Admindashboard');


Route::get('/ManageMenu', [AdminManagemenuController::class, 'AddMenu'])->name('ManageMenu');
Route::post('/ManageMenu', [AdminManagemenuController::class, 'StoreMenu'])->name('ManageMenu.store');
Route::get('/ManageMenu', [AdminManagemenuController::class, 'showMenuItems'])->name('ManageMenu');
Route::put('/menu/{id}', [AdminManagemenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [AdminManagemenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/menu/{id}/edit', [AdminManagemenuController::class, 'edit'])->name('menu.edit');



//Cart routes
Route::get('/cart', [Add2CartController::class, 'Add2Cart'])->name('add2cart');
Route::get('/add-to-cart/{id}', [Add2CartController::class, 'add'])->name('add2cart.add');
Route::post('/cart/update', [Add2CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [Add2CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [Add2CartController::class, 'checkout'])->name('checkout');
Route::get('/order-confirmation', [Add2CartController::class, 'confirmation'])->name('order.confirmation');




// Login form
Route::get('/Loginform', [AuthController::class, 'showLoginForm'])->name('Loginform');

// Handle login submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin dashboard (only accessible by logged-in admin)
Route::get('/admin/dashboard', function () {
    return view('admin.Admindashboard'); // your admin dashboard Blade
})->name('admin.dashboard')->middleware('auth');


// Admin Users Routes
Route::middleware('auth')->group(function () {
    // Show all users + add new user form
    Route::get('/manageusers', [AdminUserController::class, 'index'])->name('manageusers');

    // Store new user
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    // Delete user
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
// Delivery Dashboard Route

Route::get("layout",function(){
    return view('delivery.layout');
});
 
Route::get('/delivery-dashboard', [AuthController::class, 'showLoginForm'])->name('delivery-dashboard');
Route::get('/delivery-dashboard', [DeliveryController::class, 'Showdelivery'])->name('delivery-dashboard');


// Delivery status routes
Route::get('/delivery/status', [DeliveryController::class, 'showStatus'])->name('delivery.status');
Route::post('/delivery/status/toggle', [DeliveryController::class, 'toggleStatus'])->name('delivery.status.toggle');
