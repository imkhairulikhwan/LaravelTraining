<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //set this either one property to solve the
    //mass assignment
    protected $guarded = ['id'];
    // protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    
}