<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function () {
            $acategories = Category::get();
            View::share('acategories', $acategories);
            if (Auth::user()) {
                $wishes = wishlist::where('user_id', Auth::user()->id)->get();
                $cart = Cart::where('user_id', Auth::user()->id)->get();
                View::share('cartt', $cart,);
                View::share('wishess', $wishes,);
            }
        });


    }
}
