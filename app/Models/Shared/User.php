<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email'
    ];

    protected $hidden = [
    'password', 
    'remember_token'
    ];

}
