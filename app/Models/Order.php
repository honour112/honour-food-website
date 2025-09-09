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
        'payment_status',
        'delivery_agent_id', // ✅ add this line
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

    // Relationship: Order belongs to a delivery agent (User)
    public function deliveryAgent()
    {
        return $this->belongsTo(User::class, 'delivery_agent_id');
    }
}
