<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['name', 'price', 'content', 'feature_image_path', 'feature_image_name', 'category_id', 'user_id'];
    public function image()
    {
        return $this->hasMany(Product_image::class);
    }
}
