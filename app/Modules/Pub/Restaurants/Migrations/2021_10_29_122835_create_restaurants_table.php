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
            $table->text('image_path');
            $table->float('stars');
            $table->integer('count_user_feedback');
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

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->required()->references('id')->on('restaurants');
            $table->integer('user_id')->required()->references('id')->on('users');
            $table->integer('order_detail_id')->required()->references('id')->on('order_detais');
            $table->text('products_names')->required();
            $table->integer('total_price');
            $table->text('adres');
            $table->text('status')->nullable();
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->required()->references('id')->on('orders');
            $table->text('item_name')->required();
            $table->integer('item_count')->required()->default(1);
            $table->integer('price')->required();
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
