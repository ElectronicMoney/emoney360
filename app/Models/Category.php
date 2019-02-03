<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];


    /**
     * A Category belongs to many products
     * One to many relationship
     * @var true
     */

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
