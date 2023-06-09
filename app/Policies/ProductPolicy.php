<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // Create out methods to say can we do a paticular thing
    // in this instance; to delete
    public function delete(User $user, Product $product)
    {  
        return $user->id === $product->user_id;
    }
}
