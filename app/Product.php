<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

	protected $fillable = [
       'user_id', 'sku', 'title', 'subtitle', 'price', 'details', 'more_info', 'avatar', 'available', 'stock_available'
    ];  

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
