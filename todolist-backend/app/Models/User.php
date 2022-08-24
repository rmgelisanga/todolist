<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }

    public function projects()
    {
        return $this->hasManyThrough(
            Project::class,
            Task::class,
            'user_id',
            'id',
            'id',
            'project_id'
        );
    }
}
