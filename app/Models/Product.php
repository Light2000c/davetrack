<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'product_category',
        'tag',
        'product_name',
        'product_slug',
        'product_price',
        'product_image',
        'old_price',
        'product_description',
        'created_by',
        'updated_by',
    ];

    public function cart()
    {
        return  $this->hasMany(Cart::class);
    }

    public function hasCart(User $user)
    {
        return $this->cart->contains('user_id', $user->id);
    }

    public function order()
    {
        return  $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasMany(wishlist::class);
    }

    public function hasWishlist(User $user)
    {
        return $this->wishlist->contains('user_id', $user->id);
    }
}
