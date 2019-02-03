<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * Check if a user is verified
     *
     * @var bool
     */
    public function isVerified() {
        return $this->verified = User::VERIFIED_USER;
    }

    /**
     * check if a user is an admin
     *
     * @var bool
     */
    public function isAdmin()
    {
        return $this->admin = User::ADMIN_USER;
    }

    /**
     * generate verification code
     *
     * @var string
     */
    public static function generateVerificationCode()
    {
        return str_random(40);
    }
}
