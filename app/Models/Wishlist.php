<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Wishlist extends Model
{
    use HasFactory;

    public static function countWishlist($product_id){
        if (Auth::check()) {
            $countWishlist = self::where([
                'user_id' => Auth::id(),
                'product_id' => $product_id
            ])->count();
            return $countWishlist;
        }
    }
}
