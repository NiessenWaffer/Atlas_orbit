<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    protected $table= 'programs';

    protected $fillable = [
        'code',
        'name',
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function section(){
        return $this->hasMany(Section::class);
    }
}
