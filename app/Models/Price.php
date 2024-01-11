<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    /*   $table->string('compay_name');
    $table->tinyInteger('product_name')->comment('0:diesel,1:regular,2:super')->default(0);
    $table->timestamp('time_effect');
    $table->string('price_khr');
    $table->string('price_usd');
    $table->tinyInteger('status')->comment('0:active,1:inactive')->default(0);
    $table->tinyInteger('Is_deleted')->comment('0:not delete,1:delete')->default(0); */
    protected $fillable  = [
        'compay_name', 'product_name','order' ,'time_effect', 'price_khr', 'price_usd', 'status', 'Is_deleted'
    ];
}
