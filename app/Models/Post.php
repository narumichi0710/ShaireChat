<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'content', 'title', 'prefecture_id','address','price','profile','buy_id','post_id'
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function prefecture()
    {
        return $this->belongsTo(\App\Models\Prefecture::class, 'prefecture_id');
    }

    public function buy()
    {
        return $this->belongsTo(\App\Models\Buy::class, 'buy_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'post_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }






}

