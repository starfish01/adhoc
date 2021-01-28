<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function assignedTeam()
    {
        return $this->belongsTo(AssignedTeam::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function times()
    {
        return $this->hasMany(Time::class);
    }
}
