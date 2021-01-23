<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table = "shopping_carts";

	protected $fillable = [
       'status', 'customid',
    ];  

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
