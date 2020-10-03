<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'product_name','product_image',"stars","comment","product_content"
    ];

    public function reviews() { 

        return $this->hasMany(\App\Models\ProductReview::class, 'product_id', 'id');

    }
}
