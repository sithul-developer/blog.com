<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('compay_name');
            $table->string('product_name')->comment('0,1,2')->default(0);
            $table->tinyInteger('order_price')->comment('0,1,2,3,4,5,6')->default(0);
            $table->string('time_effect');
            $table->string('price_khr');
            $table->string('price_usd');
            $table->tinyInteger('status')->comment('0:active,1:inactive')->default(0);
            $table->tinyInteger('Is_deleted')->comment('0:not delete,1:delete')->default(0);
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
