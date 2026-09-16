<?php

namespace App\Models\Atlas\Requirements;

use Illuminate\Database\Eloquent\Model;

class RequirementType extends Model
{
    protected $table= 'requirement_types';

    protected $fillable = [
        'code',
        'name',
        'description'
    ];
}
