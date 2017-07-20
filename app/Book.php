<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'year'];

    public function authors(){
        return $this->belongsToMany('App\Author', 'book_author', 'book_id', 'author_id')->withTimestamps();
    }
}
