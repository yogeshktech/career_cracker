<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
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
                $query->where('ip_address', $ipAddress)->whereNull('user_id');
            }
        })
            ->with('course')
            ->get();

        return view('front.cart', compact('cartItems'));
    }

    /**
     * Add a course to the cart.
     *
     * @param Request $request
     * @param int $courseId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $courseId)
    {
        $user = Auth::user();
        $ipAddress = $request->ip();

        // Check if course exists
        $course = Course::find($courseId);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        // Check if the course is already in the cart
        $cartItem = Cart::where('course_id', $courseId)
            ->where(function ($query) use ($user, $ipAddress) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('ip_address', $ipAddress)->whereNull('user_id');
                }
            })
            ->first();

        if ($cartItem) {
            return redirect()->back()->with('info', 'Course is already in your cart.');
        }

        // Create new cart item
        Cart::create([
            'user_id' => $user ? $user->id : null,
            'ip_address' => $user ? null : $ipAddress,
            'course_id' => $courseId,
        ]);

        return redirect()->back()->with('success', 'Course added to cart successfully.');
    }

    /**
     * Delete a cart item.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
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
                    $query->where('ip_address', $ipAddress)->whereNull('user_id');
                }
            })
            ->first();

        if (!$cartItem) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Cart item not found or unauthorized.'], 404);
            }
            return redirect()->back()->with('error', 'Cart item not found or unauthorized.');
        }

        $cartItem->delete();

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Course removed from cart.']);
        }

        return redirect()->back()->with('success', 'Course removed from cart.');
    }

    /**
     * Update cart (placeholder, as no updates are needed).
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        return redirect()->route('cart.view')->with('info', 'Cart update not required.');
    }

    /**
     * Clear all cart items.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear(Request $request)
    {
        $user = Auth::user();
        $ipAddress = $request->ip();

        Cart::where(function ($query) use ($user, $ipAddress) {
            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                $query->where('ip_address', $ipAddress)->whereNull('user_id');
            }
        })->delete();

        return redirect()->route('cart.view')->with('success', 'Cart cleared successfully.');
    }

    /**
     * Enroll in a course from the cart.
     *
     * @param Request $request
     * @param int $courseId
     * @return \Illuminate\Http\RedirectResponse
     */
    /**
     * Handle "Buy Now" action: redirect to checkout if logged in, add to cart if not.
     *
     * @param Request $request
     * @param int $courseId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buy(Request $request, $courseId)
    {
        $user = Auth::user();
        $ipAddress = $request->ip();

        // Check if course exists
        $course = Course::find($courseId);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        if ($user) {
            // If user is logged in, redirect to checkout page with the course ID
            return redirect()->route('checkout', ['course_id' => $courseId]);
        } else {
            // If user is not logged in, add to cart
            $cartItem = Cart::where('course_id', $courseId)
                ->where('ip_address', $ipAddress)
                ->whereNull('user_id')
                ->first();

            if ($cartItem) {
                return redirect()->route('cart.view')->with('info', 'Course is already in your cart. Please login to proceed.');
            }

            Cart::create([
                'user_id' => null,
                'ip_address' => $ipAddress,
                'course_id' => $courseId,
            ]);

            return redirect()->route('login')->with('success', 'Course added to cart. Please login to proceed to checkout.');
        }
    }
}