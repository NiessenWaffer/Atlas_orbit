<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'desciption'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
