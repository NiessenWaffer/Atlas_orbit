<?php

namespace App\Models\Atlas\Requirements;

use App\Models\Shared\Student;
use Illuminate\Database\Eloquent\Model;

class StudentRequirement extends Model
{
    protected $table='student_requirements';

    protected $fillable = [
        'student_id',
        'requirement_type_id',
        'requirement_template_id',
        'status',
        'deadline'  
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function type(){
        return $this->belongsTo(RequirementType::class,'requirement_type_id');
    }

    public function template(){
        return $this->belongsTo(RequirementTemplate::class,'requirement_template_id');
    }
}
