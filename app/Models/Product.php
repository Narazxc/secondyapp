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
        'category_id'
    ];




    public function categories(){

    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
