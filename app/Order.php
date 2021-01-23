<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

	protected $fillable = [
        'shoppingcart_id', 'recipient_name', 'email', 'phone', 'status', 'sub_total', 'details'
    ];  

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function shoppingcart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingcart_id');
    }

}
