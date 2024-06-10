<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shop\Entities\shop_products;

class ShopDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        for ($i = 1; $i <=10; $i++){
            $manageStock = (bool)random_int(0,1);

            $product = shop_products::factory()->create(
                
            )

        }
    }
}
