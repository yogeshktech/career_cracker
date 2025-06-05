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
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    }

    // public function index(Request $request)
    // {
    //     $user = Auth::user();
    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
    //     }
    //     $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
    //     if ($cartItems->isEmpty()) {
    //         return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
    //     }

    //     // Calculate total for Razorpay
    //     $total = $cartItems->sum(function ($item) {
    //         return $item->course ? $item->course->sale_price : 0;
    //     });

    //     // Create Razorpay order
    //     try {
    //         $razorpayOrder = $this->razorpay->order->create([
    //             'amount' => $total * 100, // Razorpay expects amount in paise
    //             'currency' => 'INR',
    //             'payment_capture' => 1, // Auto-capture payment
    //         ]);

    //         return view('front.checkout.index', compact('user', 'cartItems', 'razorpayOrder'));
    //     } catch (\Exception $e) {
    //         Log::error('Razorpay order creation failed: ' . $e->getMessage());
    //         return redirect()->route('cart.view')->with('error', 'Failed to initiate payment: ' . $e->getMessage());
    //     }
    // }

    
    
   /**
 * Display the checkout page for cart items or a single course.
 *
 * @param Request $request
 * @return \Illuminate\View\View
 */
public function index(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
    }

    $courseId = $request->query('course_id');

    if ($courseId) {
        // Handle "Buy Now" for a single course
        $course = Course::find($courseId);
        if (!$course) {
            return redirect()->route('cart.view')->with('error', 'Course not found.');
        }
        // Create a stdClass object to mimic a Cart item
        $cartItem = new \stdClass();
        $cartItem->course = $course;
        $cartItems = collect([$cartItem]);
        $total = $course->sale_price;
    } else {
        // Handle cart-based checkout
        $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }
        $total = $cartItems->sum(function ($item) {
            return $item->course ? $item->course->sale_price : 0;
        });
    }

    // Create Razorpay order
    try {
        $razorpayOrder = $this->razorpay->order->create([
            'amount' => $total * 100, // Razorpay expects amount in paise
            'currency' => 'INR',
            'payment_capture' => 1, // Auto-capture payment
        ]);

        return view('front.checkout.index', compact('user', 'cartItems', 'razorpayOrder', 'courseId'));
    } catch (\Exception $e) {
        \Log::error('Razorpay order creation failed: ' . $e->getMessage());
        return redirect()->route('cart.view')->with('error', 'Failed to initiate payment: ' . $e->getMessage());
    }
}
//     public function process(Request $request)
// {
//     $user = Auth::user();
//     if (!$user) {
//         return response()->json(['error' => 'Please login to proceed to checkout.'], 401);
//     }
//     $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
//     if ($cartItems->isEmpty()) {
//         return response()->json(['error' => 'Your cart is empty.'], 400);
//     }

//     // Validate Razorpay payment
//     $request->validate([
//         'razorpay_payment_id' => 'required',
//         'razorpay_order_id' => 'required',
//         'razorpay_signature' => 'required',
//     ]);

//     try {
//         // Verify Razorpay payment
//         $attributes = [
//             'razorpay_order_id' => $request->razorpay_order_id,
//             'razorpay_payment_id' => $request->razorpay_payment_id,
//             'razorpay_signature' => $request->razorpay_signature,
//         ];

//         $this->razorpay->utility->verifyPaymentSignature($attributes);

//         DB::beginTransaction();

//         // Calculate total
//         $total = $cartItems->sum(function ($item) {
//             return $item->course ? $item->course->sale_price : 0;
//         });

//         // Log order creation data
//         Log::info('Creating order with data: ', [
//             'user_id' => $user->id,
//             'total' => $total,
//             'payment_method' => 'razorpay',
//             'razorpay_payment_id' => $request->razorpay_payment_id,
//             'razorpay_order_id' => $request->razorpay_order_id,
//             'status' => 'completed',
//         ]);

//         // Create order
//         $order = Order::create([
//             'user_id' => $user->id,
//             'total' => $total,
//             'payment_method' => 'razorpay',
//             'razorpay_payment_id' => $request->razorpay_payment_id,
//             'razorpay_order_id' => $request->razorpay_order_id,
//             'status' => 'completed',
//         ]);
//         Log::info('Order created for user ' . $user->id . ': Order ID ' . $order->id);

//         // Attach courses to order and create purchases
//         foreach ($cartItems as $item) {
//             if (!$item->course) {
//                 Log::warning('Course not found for cart item: ' . $item->id);
//                 continue;
//             }
//             // Attach to order
//             $order->courses()->attach($item->course_id, [
//                 'price' => $item->course->sale_price,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             // Create purchase record
//             Purchase::create([
//                 'user_id' => $user->id,
//                 'course_id' => $item->course_id,
//                 'course_title' => $item->course->title,
//                 'amount' => $item->course->sale_price,
//                 'status' => 'completed',
//                 'date' => now(),
//             ]);
//             Log::info('Purchase created for user ' . $user->id . ', course ' . $item->course_id);
//         }

//         // Enroll user in courses
//         foreach ($cartItems as $item) {
//             if (!$item->course) {
//                 continue;
//             }
//             $user->courses()->syncWithoutDetaching([
//                 $item->course_id => [
//                     'progress' => 0,
//                     'completed_lessons' => 0,
//                     'created_at' => now(),
//                     'updated_at' => now(),
//                 ]
//             ]);
//             Log::info('User ' . $user->id . ' enrolled in course ' . $item->course_id);
//         }

//         // Clear cart
//         Cart::where('user_id', $user->id)->delete();
//         Log::info('Cart cleared for user ' . $user->id);

//         DB::commit();
//         return response()->json(['success' => true, 'redirect' => route('order.confirmation', $order->id)]);
//     } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
//         DB::rollBack();
//         Log::error('Razorpay signature verification failed: ' . $e->getMessage());
//         return response()->json(['error' => 'Payment verification failed.'], 400);
//     } catch (\Exception $e) {
//         DB::rollBack();
//         Log::error('Checkout failed for user ' . $user->id . ': ' . $e->getMessage());
//         return response()->json(['error' => 'Failed to process order: ' . $e->getMessage()], 500);
//     }
// }

    

/**
 * Process the checkout payment.
 *
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 */
public function process(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json(['error' => 'Please login to proceed to checkout.'], 401);
    }

    // Validate Razorpay payment
    $request->validate([
        'razorpay_payment_id' => 'required',
        'razorpay_order_id' => 'required',
        'razorpay_signature' => 'required',
        'course_id' => 'nullable|exists:courses,id', // Optional course_id for "Buy Now"
    ]);

    try {
        // Verify Razorpay payment
        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
        ];

        $this->razorpay->utility->verifyPaymentSignature($attributes);

        DB::beginTransaction();

        if ($request->course_id) {
            // Handle "Buy Now" for a single course
            $course = Course::find($request->course_id);
            if (!$course) {
                DB::rollBack();
                return response()->json(['error' => 'Course not found.'], 400);
            }
            // Create a stdClass object to mimic a Cart item
            $cartItem = new \stdClass();
            $cartItem->course = $course;
            $cartItems = collect([$cartItem]);
            $total = $course->sale_price;
        } else {
            // Handle cart-based checkout
            $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
            if ($cartItems->isEmpty()) {
                DB::rollBack();
                return response()->json(['error' => 'Your cart is empty.'], 400);
            }
            $total = $cartItems->sum(function ($item) {
                return $item->course ? $item->course->sale_price : 0;
            });
        }

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'payment_method' => 'razorpay',
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id' => $request->razorpay_order_id,
            'status' => 'completed',
        ]);
        \Log::info('Order created for user ' . $user->id . ': Order ID ' . $order->id);

        // Attach courses to order and create purchases
        foreach ($cartItems as $item) {
            if (!$item->course) {
                \Log::warning('Course not found for cart item: ' . ($item->id ?? 'Buy Now'));
                continue;
            }
            // Attach to order
            $order->courses()->attach($item->course->id, [
                'price' => $item->course->sale_price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // Create purchase record
            Purchase::create([
                'user_id' => $user->id,
                'course_id' => $item->course->id,
                'course_title' => $item->course->title,
                'amount' => $item->course->sale_price,
                'status' => 'completed',
                'date' => now(),
            ]);
            \Log::info('Purchase created for user ' . $user->id . ', course ' . $item->course->id);

            // Enroll user in course
            $user->courses()->syncWithoutDetaching([
                $item->course->id => [
                    'progress' => 0,
                    'completed_lessons' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
            \Log::info('User ' . $user->id . ' enrolled in course ' . $item->course->id);
        }

        // Clear cart only for cart-based checkout
        if (!$request->course_id) {
            Cart::where('user_id', $user->id)->delete();
            \Log::info('Cart cleared for user ' . $user->id);
        }

        DB::commit();
        return response()->json(['success' => true, 'redirect' => route('order.confirmation', $order->id)]);
    } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
        DB::rollBack();
        \Log::error('Razorpay signature verification failed: ' . $e->getMessage());
        return response()->json(['error' => 'Payment verification failed.'], 400);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Checkout failed for user ' . $user->id . ': ' . $e->getMessage());
        return response()->json(['error' => 'Failed to process order: ' . $e->getMessage()], 500);
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