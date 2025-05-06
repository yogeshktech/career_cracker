<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CarrirController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\StudentController;
use App\Http\Controllers\Front\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/verify-otp', [RegisteredUserController::class, 'verifyOtp'])->name('otp.verify.post');
Route::post('/resend-otp', [RegisteredUserController::class, 'resendOtp'])->name('otp.resend');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [HomeController::class, 'AllCourse'])->name('all_course');
Route::get('/courses/{course}', [HomeController::class, 'show'])->name('courses.show');

Route::post('/courses/{course}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/blogs', [HomeController::class, 'AllBlog'])->name('blogs');
Route::get('/blogs/{id}', [HomeController::class, 'BlogDetails'])->name('blog.details');
Route::get('/career', [HomeController::class, 'Career'])->name('career');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/career', [HomeController::class, 'store'])->name('careers.store');
Route::post('/enquery', [HomeController::class, 'enquiry_save'])->name('enquiry_send');

require __DIR__ . '/auth.php';

// Admin Routes
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/students', [AdminController::class, 'index'])->name('admin.students.index');
    Route::get('/students/create', [AdminController::class, 'create'])->name('admin.students.create');
    Route::post('/students', [AdminController::class, 'store'])->name('admin.students.store');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::patch('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::get('/inbox', [AdminController::class, 'inbox'])->name('inbox');
        Route::get('/upgrade', [AdminController::class, 'upgradePlan'])->name('upgrade');
        Route::get('/activity', [AdminController::class, 'activityLog'])->name('activity');
        Route::get('/email', [AdminController::class, 'emailDashboard'])->name('email');

        Route::prefix('courses')->name('courses.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::post('/store', [CourseController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [CourseController::class, 'update'])->name('update');
            Route::delete('/{id}', [CourseController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('subcategories')->name('subcategories.')->group(function () {
            Route::get('/', [SubcategoryController::class, 'index'])->name('index');
            Route::get('/create', [SubcategoryController::class, 'create'])->name('create');
            Route::post('/store', [SubcategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [SubcategoryController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubcategoryController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('faculties')->name('faculties.')->group(function () {
            Route::get('/', [FacultyController::class, 'index'])->name('index');
            Route::get('/create', [FacultyController::class, 'create'])->name('create');
            Route::post('/store', [FacultyController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [FacultyController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [FacultyController::class, 'update'])->name('update');
            Route::delete('/{id}', [FacultyController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('language')->name('language.')->group(function () {
            Route::get('/', [LanguageController::class, 'index'])->name('index');
            Route::get('/create', [LanguageController::class, 'create'])->name('create');
            Route::post('/store', [LanguageController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LanguageController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [LanguageController::class, 'update'])->name('update');
            Route::delete('/{id}', [LanguageController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('blogs')->name('blogs.')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/create', [BlogController::class, 'create'])->name('create');
            Route::post('/store', [BlogController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [BlogController::class, 'update'])->name('update');
            Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::get('/create', [TestimonialController::class, 'create'])->name('create');
            Route::post('/store', [TestimonialController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [TestimonialController::class, 'update'])->name('update');
            Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('career')->name('career.')->group(function () {
            Route::get('/', [CarrirController::class, 'index'])->name('index');
            Route::get('/create', [CarrirController::class, 'create'])->name('create');
            Route::post('/store', [CarrirController::class, 'store'])->name('store');
            Route::delete('/{id}', [CarrirController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('enquery')->name('enquery.')->group(function () {
            Route::get('/', [CarrirController::class, 'viewEnquery'])->name('view');
            Route::delete('/{id}', [CarrirController::class, 'delete'])->name('delete');
        });
    });
});

// Student Dashboard Routes
Route::prefix('student')->name('student.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::patch('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
    Route::get('/enrolled-courses', [StudentController::class, 'enrolledCourses'])->name('enrolled.courses');
    Route::get('/purchase-history', [StudentController::class, 'purchaseHistory'])->name('purchase.history');
    Route::get('/settings', [StudentController::class, 'settings'])->name('settings');
    Route::patch('/settings', [StudentController::class, 'updateSettings'])->name('settings.update');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/live-class/{course}', [StudentController::class, 'joinLiveClass'])->name('live-class.join');
});