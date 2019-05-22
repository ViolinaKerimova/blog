<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable =['Title', 'body'];
    public function author() 
    {
        return $this->belongsTo(User::class, 'users_id'); //mnn6 s 1 red se pi6at
        
    }
    public function getExcerptAttribute() {
        $body=strip_tags($this->body); //mahahtml samo sadarjaneto ostavq
        return mb_substr($body, 0 ,100) . '...'; //kirilicata
        
    }
}
