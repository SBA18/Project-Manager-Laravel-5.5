<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['customer_id', 'user_id', 'body'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
