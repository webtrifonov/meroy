<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
