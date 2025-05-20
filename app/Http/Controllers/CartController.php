<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $carts = User::find(auth()->user())[0]->cart()->get();
        return view("pages.cart",compact('carts'));
    }



    public function store(Request $request)
    {
        Cart::create([
            'user_id'=>Session('user')->id,
            'product_id'=>$request->product,
        ]);
        return redirect()->back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}
