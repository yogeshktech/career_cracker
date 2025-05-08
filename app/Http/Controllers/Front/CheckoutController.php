<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        }
        $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }
        return view('front.checkout.index', compact('user', 'cartItems'));
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        }
        $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        try {
            DB::beginTransaction();

            // Calculate total
            $total = $cartItems->sum(function ($item) {
                return $item->course ? $item->course->sale_price : 0;
            });

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
                'payment_method' => 'cod',
                'status' => 'pending', // COD orders start as pending
            ]);
            Log::info('Order created for user ' . $user->id . ': Order ID ' . $order->id);

            // Attach courses to order and create purchases
            foreach ($cartItems as $item) {
                if (!$item->course) {
                    Log::warning('Course not found for cart item: ' . $item->id);
                    continue;
                }
                // Attach to order
                $order->courses()->attach($item->course_id, [
                    'price' => $item->course->sale_price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                // Create purchase record
                Purchase::create([
                    'user_id' => $user->id,
                    'course_id' => $item->course_id,
                    'course_title' => $item->course->title,
                    'amount' => $item->course->sale_price,
                    'status' => 'completed', // Purchase is complete even if order is pending
                    'date' => now(),
                ]);
                Log::info('Purchase created for user ' . $user->id . ', course ' . $item->course_id);
            }

            // Enroll user in courses
            foreach ($cartItems as $item) {
                if (!$item->course) {
                    continue;
                }
                $user->courses()->syncWithoutDetaching([
                    $item->course_id => [
                        'progress' => 0,
                        'completed_lessons' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ]);
                Log::info('User ' . $user->id . ' enrolled in course ' . $item->course_id);
            }

            // Clear cart
            Cart::where('user_id', $user->id)->delete();
            Log::info('Cart cleared for user ' . $user->id);

            DB::commit();
            return redirect()->route('order.confirmation', $order->id)
                ->with('success', 'Order placed successfully with Cash on Delivery.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout failed for user ' . $user->id . ': ' . $e->getMessage());
            return redirect()->route('cart.view')->with('error', 'Failed to process order: ' . $e->getMessage());
        }
    }

    public function confirmation($orderId)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view order confirmation.');
        }
        $order = Order::where('id', $orderId)->where('user_id', $user->id)->with('courses')->firstOrFail();
        return view('front.checkout.confirmation', compact('order'));
    }
}