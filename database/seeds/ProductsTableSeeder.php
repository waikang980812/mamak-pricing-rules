<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::truncate();

        Product::create([
            'name' => 'Kopi',
            'price' => 2.5,
        ]);

        Product::create([
            'name' => 'Roti Kosong',
            'price' => 1.5,
        ]);

        Product::create([
            'name' => 'Teh Tarik',
            'price' => 2,
        ]);

        

        


    }
}
