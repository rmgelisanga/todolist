<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tasks()
    {


        return $this->hasMany(
            Task::class,
            'project_id',
            'id'
        );
    }

    public function taskUser()
    {
        return $this->hasManyThrough(
            User::class,
            Task::class,
            'project_id',
            'id',
            'id',
            'user_id'
        );
    }
}
