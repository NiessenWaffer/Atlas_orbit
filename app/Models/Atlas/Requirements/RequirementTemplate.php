<?php

namespace App\Models\Atlas\Requirements;

use Illuminate\Database\Eloquent\Model;

class RequirementTemplate extends Model
{
    protected $table = 'requirement_templates';
    
    protected $fillable = [
        'program_id',
        'academic_term_id',
        'name',
        'version',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function item(){
        return $this->hasMany(RequirementTemplateItem::class);
    }
}
