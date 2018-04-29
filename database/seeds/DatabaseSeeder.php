<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Category::insert([
          ['name' =>  'Computer'],
          ['name' =>  'Cellphone'],
          ['name' =>  'Watch'],
          ['name' =>  'Headphone']
        ]);
        Subcategory::insert([
          ['name' =>  'Laptop', 'category_id' => '1'],
          ['name' =>  'Desktop', 'category_id' => '1'],
          ['name' =>  'Iphone', 'category_id' => '2'],
          ['name' =>  'Wrist', 'category_id' => '3'],
          ['name' =>  'Wired', 'category_id' => '4']
        ]);
    }
}
