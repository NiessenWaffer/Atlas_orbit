<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'program_id',
        'section_id',
        'student_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
