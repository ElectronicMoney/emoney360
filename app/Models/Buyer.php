<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaction;

class Buyer extends User
{
    /**
     * A buyer has many transactions
     * One to many relationship
     * @var bool
     */
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
