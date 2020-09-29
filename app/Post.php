<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'post';
    public function scopelatestFirst()
    {
        return $this->latest()->first();
    }
}
