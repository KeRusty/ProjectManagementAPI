<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = ['task_name', 'date', 'hours', 'user_id', 'project_id'];

    // Each Timesheet belongs to one User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Each Timesheet belongs to one Project
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

