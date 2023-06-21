<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function scopeFilter ($query, array $filters){
        if($filters['tableSearch'] ?? false){
        //     $query->where('product_id', 'like', '%' . request('tableSearch') . '%');
        // }
        $query->whereHas('product', function ($query) use ($filters) {
            $query->where('title', 'like', '%' . $filters['tableSearch'] . '%');
        });
        }
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
