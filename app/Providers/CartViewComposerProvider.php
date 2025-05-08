<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CartViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['front.layouts.header', 'front.layouts.layout'], function ($view) {
            $user = Auth::user();
            $ipAddress = Request::ip();

            $cartItems = Cart::where(function ($query) use ($user, $ipAddress) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('ip_address', $ipAddress)->whereNull('user_id');
                }
            })
                ->with('course')
                ->get();

            $cartCount = $cartItems->count();

            $view->with('cartItems', $cartItems)->with('cartCount', $cartCount);
        });
    }
}