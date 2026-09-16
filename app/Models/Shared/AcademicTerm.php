<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
    protected $table='academic_term';

    protected $fillable = [
        'code',
        'name',
        'is_active'
    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];
}
