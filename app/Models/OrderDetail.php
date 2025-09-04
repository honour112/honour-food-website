<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_item_id',
        'item_name',
        'unit_price',
        'quantity',
        'line_total',
    ];

    /**
     * Relationship: An OrderDetail belongs to an Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship: An OrderDetail belongs to a MenuItem.
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id');
    }
}
