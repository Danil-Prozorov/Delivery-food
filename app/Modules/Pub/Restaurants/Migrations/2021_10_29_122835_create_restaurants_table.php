<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->text('restaurant_name');
            $table->integer('count_products')->default(0);
            $table->timestamps();
        });

        Schema::create('restaurants_products', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->required()->references('id')->on('restaurants');
            $table->text('product_name')->required();
            $table->text('ingredients')->required();
            $table->text('image_path');
            $table->integer('price');
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
        Schema::dropIfExists('restaurants');
    }
}