<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    //
    protected $table = "in_shopping_carts";

	protected $fillable = [
        'product_id', 'shoppingcart_id', 'count',
    ];  

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function product(){
        #code... 
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function shoppingcart(){
        # code...
        return $this->belongsTo(ShoppingCart::class, 'shoppingcart_id');
    }
}
