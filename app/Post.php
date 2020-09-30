<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'post';
    protected $fillable = ['title', 'slug', 'body'];    //field sudah d filter
    // protected $guarded = [];    // semua fild yg ada di form di ambil
}
