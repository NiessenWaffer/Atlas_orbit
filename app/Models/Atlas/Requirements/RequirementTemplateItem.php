<?php

namespace App\Models\Atlas\Requirements;

use Illuminate\Database\Eloquent\Model;

class RequirementTemplateItem extends Model
{
    protected $table ='requirement_template_items';

    protected $fillable = [
        'requirement_template_id',
        'requirement_template_type_id',
        'is_mandatory',
        'deadline'
    ];

    public function type(){
        return $this->belongsTo(RequirementType::class);
    }
}
