<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = ['name', 'email', 'password', 'role', 'uuid'];

    // Add this function to handle login with either username or email
    public function findForPassport($username) {
        return $this->orWhere('email', $username)->orWhere('username', $username)->first();
    }
}
