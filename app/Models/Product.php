<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;
use App\Models\Transaction;
use App\Models\Category;

class Product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    /**
     * Method to check if a product is avaialable or not
     * @var bool
     */
    public function isAvailable() {
        return $this->status = Product::AVAILABLE_PRODUCT;
    }

    /**
     * A product belongs to one seller
     * One to one relationship
     * @var true
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * A product has many transactions
     * One to many relationship
     * @var true
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * A product belongs to many categories
     * One to many relationship
     * @var true
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
