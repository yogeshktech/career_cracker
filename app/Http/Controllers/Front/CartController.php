<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function view(Request $request)
    {
        $user = Auth::user();
        $ipAddress = $request->ip();

        $cartItems = Cart::where(function ($query) use ($user, $ipAddress) {
            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                $query->where('ip_address', $ipAddress);
            }
        })
            ->with('course') 
            ->get();

        return view('front.cart', compact('cartItems'));
    }

    /**
     * Delete a cart item.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        $user = Auth::user();
        $ipAddress = $request->ip();

        $cartItem = Cart::where('id', $id)
            ->where(function ($query) use ($user, $ipAddress) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('ip_address', $ipAddress);
                }
            })
            ->first();

        if (!$cartItem) {
            return redirect()->route('cart.view')->with('error', 'Cart item not found or unauthorized.');
        }

        $cartItem->delete();

        return redirect()->route('cart.view')->with('success', 'Course removed from cart.');
    }
}