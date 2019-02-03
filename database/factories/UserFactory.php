<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Seller;
use App\Models\Buyer;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * Factory for User Model
 *
 */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
        'verified' => $verified = $faker->randomElement([User::UNVERIFIED_USER, User::VERIFIED_USER]),
        'verification_token' => $verified == User::VERIFIED_USER ? null: User::generateVerificationCode(),
        'admin' => $admin = $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
    ];
});

/**
 * Factory for Category Model
 *
 * @return bool
 */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

/**
 * Factory for Product Model
 *
 * @return bool
 */
$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.png']),
        'seller_id' => User::all()->random()->id,
    ];
});


/**
 * Factory for Transaction Model
 *
 * @return bool
 */
$factory->define(Transaction::class, function (Faker $faker) {
    $seller = Seller::has('products')->get()->random();
    $buyer = User::all()->except($seller->id)->random();
    return [
        'buyer_id' => $buyer->id,
        'product_id' => $seller->products->random()->id,
        'quantity' => $faker->numberBetween(1, 3),
    ];
});
