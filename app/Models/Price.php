<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable  = [
        'compay_name', 'product_name','order_price','time_effect', 'price_khr', 'price_usd', 'status', 'Is_deleted',
    ];
}
