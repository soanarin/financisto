<?php

use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //seed some values
        DB::table('subcategories')->insert(
            ['subcategory' => 'coop','category_id'=>1],
            ['subcategory' => 'market','category_id'=>1],
            ['subcategory' => 'petrol','category_id'=>2],
            ['subcategory' => 'repair','category_id'=>2]

        ); 
    }
}
