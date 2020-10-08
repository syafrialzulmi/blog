<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];    //field sudah d filter

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
