<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table= 'employees';

    protected $fillable = [
        'user_id',
        'employee_number',
        'department'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
