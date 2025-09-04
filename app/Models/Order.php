<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'location',
        'email',
        'payment_method',
        'total',
        'order_status',
        'payment_status'
    ];

    // Each order has many order details
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Orders belong to many menu items through order_details
    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'order_details')
                    ->withPivot('quantity', 'unit_price', 'line_total')
                    ->withTimestamps();
    }
}
