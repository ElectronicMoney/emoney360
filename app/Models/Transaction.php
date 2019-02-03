<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
use App\Models\Product;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qunatity',
        'buyer_id',
        'product_id',
    ];

    /**
     * A Transaction belongs to one buyer
     * One to one relationship
     * @var true
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * A Transaction belongs to one product
     * One to one relationship
     * @var true
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


