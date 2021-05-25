<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'id'    => 1,
            'title' => 'Category 1',
        ]);


        Category::create([
            'id'    => 2,
            'title' => 'Category 2',
        ]);


        Category::create([
            'id'    => 3,
            'title' => 'Category 3',
        ]);


        Category::create([
            'id'    => 4,
            'title' => 'Category 4',
        ]);

        Category::create([
            'id'    => 5,
            'title' => 'Category 5',
        ]);

    }
}
