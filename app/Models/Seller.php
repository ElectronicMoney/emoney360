<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;

class Seller extends User
{
    /**
     * A Seller has many products
     * One to many relationship
     * @var true
     */
    public function rpoducts()
    {
        return $this->hasMany(Product::class);
    }
}
