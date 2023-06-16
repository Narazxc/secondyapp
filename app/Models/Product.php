<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // laravel automatically connect to products table
    // don't have to manually connect like below
    // protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'price',
        'tags',
        'category_id'
    ];


    public function user(){
        return $this->belongsTo(User::class); 
    }
    
    // NAMING OF THESE RELATIONSHIP METHODS ARE IMPORTANT!!!!!
    // belongsTo method name singular
    public function category(){
        return $this->belongsTo(Category::class);
    }


    // hasMany method name plural
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
