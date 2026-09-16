<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table ='sections';

    protected $fillable = [
        'program_id',
        'name',
        'year_level'
    ];
}
