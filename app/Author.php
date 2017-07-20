<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    public function books(){
        return $this->belongsToMany('App\Book', 'book_author', 'author_id', 'book_id')->withTimestamps();
    }
}
