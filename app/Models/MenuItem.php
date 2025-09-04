<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'image_url',
    ];

    /**
     * Relationship: A MenuItem can appear in many order details.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'menu_item_id');
    }
}
