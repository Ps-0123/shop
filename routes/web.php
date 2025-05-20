<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Models\comment;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    $products = Product::latest()->paginate(5);
    return view('index', compact('products'));
})->name('home');
Route::middleware('guest')->group(function () {

    Route::view('register', 'auth.register')->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::view('login', 'auth.login')->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'dashboard','middleware'=>'auth'], function () {
    Route::get('/', function () {
        return view('user.index');
    })->name('dashboard');

    Route::resource('cart',CartController::class)->only(['index','store','destroy']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('product', function () {
        $products = Product::latest()->paginate(10);
            return view('user.seller.product',compact('products'));
    })->name('admin_product');

    Route::get('users', function () {
        $users = User::latest()->paginate(10);
        return view('user.seller.user',compact('users'));
    })->name('admin_users');



    Route::get('comment',function(){
        $comments = comment::latest()->get();
        return view('user.seller.comments',compact('comments'));
    })->name('Admin-comment');
    });
Route::resource('product', ProductController::class);

Route::get('comment/{product}',[CommentController::class,'create'])->name('comment');
Route::resource('comment',CommentController::class)->except(['index','create','show','edit']);

