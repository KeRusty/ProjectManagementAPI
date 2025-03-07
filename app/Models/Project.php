<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department', 'start_date', 'end_date', 'status'];

    // Many-to-Many Relationship with Users
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    // One-to-Many Relationship with Timesheets
    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class);
    }
}

