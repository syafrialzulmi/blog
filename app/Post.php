<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];    //field sudah d filter , 'user_id'
    
    protected $with = ['author', 'tags', 'category'];

    public function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function takeImage()
    public function getTakeImageAttribute()
    {
        return "/storage/".$this->thumbnail;
    }
}
