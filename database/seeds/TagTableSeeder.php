<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeCommerce\Tag::truncate();

        factory('CodeCommerce\Tag', 10)->create();
    }
}
