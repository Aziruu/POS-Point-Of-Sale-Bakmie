<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'total_price', 'payment_type', 'paid', 'cash_amount', 'change'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
