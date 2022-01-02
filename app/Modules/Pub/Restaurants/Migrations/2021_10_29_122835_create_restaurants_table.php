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
            $table->char('restaurant_name', 65);
            $table->char('image_path', 65);
            $table->float('stars');
            $table->integer('count_user_feedback');
            $table->integer('count_products')->default(0);
            $table->timestamps();
        });

        Schema::create('restaurants_products', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->required()->references('id')->on('restaurants');
            $table->char('restaurant_name', 65)->required();
            $table->char('product_name', 65)->required();
            $table->text('ingredients')->required();
            $table->char('image_path', 65);
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->required()->references('id')->on('users');
            $table->integer('total_price');
            $table->char('address', 150)->required();
            $table->char('status', 40)->nullable();
            $table->timestamps();
        });

        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->required()->references('id')->on('orders');
            $table->integer('user_id')->required()->references('id')->on('users');
            $table->char('restaurant_name', 65)->required();
            $table->char('item_name', 65)->required();
            $table->integer('item_count')->required()->default(1);
            $table->integer('price')->required();
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
