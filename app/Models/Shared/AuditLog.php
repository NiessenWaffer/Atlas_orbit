<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table='audit_logs';

    protected $fillable = [
        'actor_id',
        'action',
        'entity',
        'meta'
    ];
}
