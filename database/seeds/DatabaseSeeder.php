<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Seller;
use App\Models\Buyer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //delete all data on each table on any call
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        //The quantities of factories to create
        $userQuantity = 200;
        $categoryQuantity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

        //Use factory helper to create the data
        factory(User::class, $userQuantity)->create();
        factory(Category::class, $categoryQuantity)->create();
        factory(Product::class, $productQuantity)->create()->each(function($product) {
            $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
            $product->categories()->attach($categories);
        });
        factory(Transaction::class, $transactionQuantity)->create();
    }
}
