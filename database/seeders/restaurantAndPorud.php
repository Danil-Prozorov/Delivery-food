<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class restaurantAndPorud extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert(
          [
            [
              'restaurant_name'     => 'Пицца плюс',
              'image_path'          => 'uploads/pizza_plus.png',
              'stars'               => 4.99,
              'count_user_feedback' => 1,
              'count_products'      => 3,
            ],
            [
              'restaurant_name'     => 'Тануки',
              'image_path'          => 'uploads/tanuki.png',
              'stars'               => 4.99,
              'count_user_feedback' => 1,
              'count_products'      => 3,
            ],
            [
              'restaurant_name'     => 'Food Band',
              'image_path'          => 'uploads/foodband.png',
              'stars'               => 4.99,
              'count_user_feedback' => 1,
              'count_products'      => 3,
            ],
            [
              'restaurant_name'     => 'PizzaBurger',
              'image_path'          => 'uploads/pizza_burger.png',
              'stars'               => 4.99,
              'count_user_feedback' => 1,
              'count_products'      => 3,
            ],
          ]
        );

        DB::table('restaurants_products')->insert(
          [
            [
              'restaurant_id' => 1,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/italian_pizza.jpg',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 1,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/pizza_cheese.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 1,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/italian_pizza.jpg',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 1,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/pizza_cheese.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 2,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => '200',
            ],
            [
              'restaurant_id' => 2,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 2,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 2,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 3,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 3,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 3,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 3,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 4,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 4,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
            [
              'restaurant_id' => 4,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Оливки, грибы, помидоры, брокколи, укроп, тесто',
              'image_path'    => 'uploads/rol_kriv.png',
              'price'         => 200,
            ],
            [
              'restaurant_id' => 4,
              'product_name'  => 'Итальянская пицца',
              'ingredients'   => 'Тесто, сыр комамбер, сыр рокфор, петрушка, перец, помидоры',
              'image_path'    => 'uploads/Sysi.jpg',
              'price'         => 300,
            ],
          ]
        );
    }
}
