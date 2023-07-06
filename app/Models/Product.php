<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
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
        'category_id',
        'status'
    ];

    protected $casts = [
        'product_status' => 'boolean',
    ];


    // Check if a user already added this product to thier favorite once already
    public function favoritedBy(User $user)
    {
        return $this->favorites->contains('user_id', $user->id);
    }


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

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function userContact()
    {
        return $this->hasOne(UserContact::class);
    }

    public function scopeFilter ($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }

        if($filters['tableSearch'] ?? false){
            $query->where('title', 'like', '%' . request('tableSearch') . '%')
            ->orWhere('tags', 'like', '%' . request('tableSearch') . '%');
        }

    }
}
