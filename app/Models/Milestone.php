<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Milestone extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class, 'milestone_id', 'id');
    }
}
