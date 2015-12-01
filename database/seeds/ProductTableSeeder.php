<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeCommerce\Product::truncate();

        factory('CodeCommerce\Product', 40)->create();

        foreach(\CodeCommerce\Product::all() as $product)
        {
            $product->tags()->sync([rand(1, 10)]);
        }
    }
}
