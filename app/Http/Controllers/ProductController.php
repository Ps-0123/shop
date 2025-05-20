<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller implements HasMiddleware
{
    public static function middleware() : array
    {
        return [
            new Middleware(['auth', 'Admin'], except: ['store', 'show', 'index']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = null;
        if($request->hasFile('cover')){
            $path = Storage::disk('public')->put('Product_images',$request->cover);
        }
        $request->validate(
            ['name' => 'required', 'content' => 'required'
        ,'cover'=>['max:4500','mimes:png,jpg,webp,jpeg'],
        'price'=>'required',
        'inventory'=>'required',

    ],
            ['required' => 'این فیلد اجباری است']
        );
        Product::create([
            'name'=>$request->name,
            'content'=>$request->content,
            'price'=>$request->price,
            'inventory'=>$request->inventory,
            'cover'=>$path,
        ]);
        return redirect()->route('admin_product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $comments = $product->Comments;
        setcookie('product',"$product->id",time()+ (365*24*3600),"/");
        return view('pages.product',compact(['product','comments']));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('user.seller.proedit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $path = $product->cover;
        if($request->hasFile('cover')){
            Storage::disk('public')->delete($product->cover);
            $path = Storage::disk('public')->put('Product_images',$request->cover);
        }
        $request->validate(
            ['name' => 'required', 'content' => 'required'
        ,'cover'=>['max:4500','mimes:png,jpg,webp,jpeg'],
        'price'=>'required',
        'inventory'=>'required',

    ],
            ['required' => 'این فیلد اجباری است']
        );
        $product->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'price'=>$request->price,
            'inventory'=>$request->inventory,
            'cover'=>$path,
        ]);
        return redirect()->route('admin_product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->cover);
        $product->delete();
        return redirect()->route('admin_product');
    }
}
