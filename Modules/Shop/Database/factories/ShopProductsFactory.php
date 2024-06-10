<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shop\Entities\shop_products;
use Illuminate\Support\Str;

class ShopProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Shop\Entities\shop_products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = fake()->word(2, true);

        return [
        'sku' => fake()->isbn10,
        'type'=> shop_products::SIMPLE,
        'name'=> $name,
        'slug'=> Str::slug($name),
        'price'=>fake()->randomFloat ,
        'status'=>shop_products::ACTIVE,
        'publish_date'=> now(),
        'excerpt'=>fake()->text(),
        'body'=> fake()->text(),
        ];
    }
}

