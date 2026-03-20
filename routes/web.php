<?php

use App\Http\Controllers\Add2CartController;
use App\Http\Controllers\AdminManagemenuController;
use App\Http\Controllers\BookDashboardController;
use App\Http\Controllers\BookTableController;   
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\ReviewdashboardController;
use App\Http\Controllers\ReviewPageController;
use App\Http\Controllers\OrderfrontdeskController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AssignDeliveryController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// ==================== Website Routes ====================
Route::get('/', fn() => view('website.home-page'))->name('home-page');
Route::get('/about', fn() => view('website.about-page'))->name('about-page');
Route::get('/menu', [MenuPageController::class, 'showMenuItems'])->name('menu-page');
Route::get('/review', [ReviewPageController::class,'ReviewPage'])->name('review-page');
Route::post('/review', [ReviewPageController::class,'storeReview'])->name('store-review');
Route::get('/contact', fn() => view('website.contact-page'))->name('contact-page');


Route::post('/orders/{id}/mark-as-paid', [OrderController::class, 'confirmPayment']);

Route::get('/booktable', [BookTableController::class, 'booktablePage'])->name('booktable-page');
Route::post('/booktable', [BookTableController::class, 'booktable'])->name('booktable-page');

// ==================== Cart Routes ====================
Route::get('/cart', [Add2CartController::class, 'Add2Cart'])->name('add2cart');
Route::get('/add-to-cart/{id}', [Add2CartController::class, 'add'])->name('add2cart.add');
Route::post('/cart/update', [Add2CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [Add2CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [Add2CartController::class, 'checkout'])->name('checkout');
Route::get('/order-confirmation', [Add2CartController::class, 'confirmation'])->name('order.confirmation');

// ==================== Auth Routes ====================
Route::get('/Loginform', [AuthController::class, 'showLoginForm'])->name('Loginform');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== Admin Routes ====================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('Admin.Admindashboard'))->name('admin.dashboard');

    // Admin Manage Menu
    Route::get('/ManageMenu', [AdminManagemenuController::class, 'ManageMenu'])->name('ManageMenu'); // <--- fixed
    Route::post('/ManageMenu', [AdminManagemenuController::class, 'StoreMenu'])->name('ManageMenu.store');
    Route::put('/menu/{id}', [AdminManagemenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [AdminManagemenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('/menu/{id}/edit', [AdminManagemenuController::class, 'edit'])->name('menu.edit');
});

    // Admin Users
    Route::get('/manageusers', [AdminUserController::class, 'index'])->name('manageusers');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Review Dashboard
    Route::get('/reviews', [ReviewdashboardController::class,'index'])->name('reviews');
    Route::post('/reviews',[ReviewdashboardController::class,'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewdashboardController::class, 'destroy'])->name('reviews.destroy');
    Route::put('/reviews/{id}', [ReviewdashboardController::class, 'update'])->name('reviews.update');


// ==================== Frontdesk Routes ====================
Route::middleware(['auth', 'role:frontdesk'])->group(function () {
    Route::get('/dashboard', fn() => view('frontdesk.dashboard'))->name('dashboard');
    Route::get('/frontdesk', fn() => view('frontdesk.frontdesk-dashboard'))->name('frontdesk-dashboard');
    Route::get('/assigndelivery', [AssignDeliveryController::class, 'assignDelivery'])->name('assigndelivery');
    Route::get('/managebookings', [BookDashboardController::class, 'showBookings'])->name('managebookings');

    // Orders
    Route::get('/frontdesk/orders', [OrderfrontdeskController::class, 'showOrder'])->name('manageorders');
    Route::post('/frontdesk/orders/{id}/accept', [OrderfrontdeskController::class, 'accept'])->name('frontdesk.orders.accept');
    Route::post('/frontdesk/orders/{id}/decline', [OrderfrontdeskController::class, 'decline'])->name('frontdesk.orders.decline');
    Route::post('/frontdesk/orders/{id}/payment', [OrderfrontdeskController::class, 'updatePaymentStatus'])->name('frontdesk.orders.updatePayment');

    // Assign delivery
    Route::post('/frontdesk/assign-delivery/{orderId}', [AssignDeliveryController::class, 'assignToAgent'])->name('frontdesk.assign.toAgent');
});

// ==================== Delivery Routes ====================
Route::middleware(['auth', 'role:delivery'])->group(function () {
    Route::get('/delivery-dashboard', [DeliveryController::class, 'Showdelivery'])->name('delivery-dashboard');
    Route::get('/delivery/status', [DeliveryController::class, 'showStatus'])->name('delivery.status');
    Route::post('/delivery/status/toggle', [DeliveryController::class, 'toggleStatus'])->name('delivery.status.toggle');
    Route::get('/delivery/assigned-orders', [DeliveryController::class, 'myAssignedOrders'])->name('delivery.assignedOrders');
});
// Reports
Route::get('/admin/reports', [ReportController::class, 'AdminReport'])->name('admin.reports');
Route::get('/delivery/reports',[ReportController::class, 'DeliveryReport'])->name('delivery.reports');


// Route::get('/admin/report',[ReportController::class,'AdminReport'])->name('admin.report');

Route::get('/admin/report/download',[ReportController::class,'downloadReport'])->name('report.download');


// Thank you page 

Route::get('/thanks', [OrderController::class, 'showThanks'])->name('thanks-page');