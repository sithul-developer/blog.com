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
        Schema::create('promotionals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->tinyInteger('order')->comment('0,1,2,3')->default(0);
            $table->tinyInteger('options')->comment('0,1,2,3')->default(0);
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
        Schema::dropIfExists('promotionals');
    }
};
