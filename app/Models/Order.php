<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function address()
    {
        return $this->belongsTo(CustomerAddress::class, 'address_id');
    }

}
