<?php

namespace App\Listeners;

use App\Models\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;

class MergeCartOnLogin
{
    /**
     * Handle the Login event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $ipAddress = Request::ip();

        // Find guest cart items
        $guestCartItems = Cart::where('ip_address', $ipAddress)
            ->whereNull('user_id')
            ->get();

        if ($guestCartItems->isEmpty()) {
            return;
        }

        foreach ($guestCartItems as $guestItem) {
            // Check if the course is already in the user's cart
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('course_id', $guestItem->course_id)
                ->first();

            if (!$existingCartItem) {
                // Transfer the cart item to the user
                $guestItem->update([
                    'user_id' => $user->id,
                    'ip_address' => null,
                ]);
            } else {
                // Delete the guest cart item to avoid duplicates
                $guestItem->delete();
            }
        }
    }
}