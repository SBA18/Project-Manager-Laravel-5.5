<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $guarded = [];
    
	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
    	return $this->hasMany(Project::class);
    }

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
