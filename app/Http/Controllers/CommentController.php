<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Product;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    public function store(Request $request){
        $user_id = 0;
        if(Session('user')!=null){
        $user_id = Session('user')->id;
        }
         Product::find($request->product)->Comments()->create([
             'content' => $request->comment, 
             'user_id' => $user_id,
         ]);
         return redirect()->back();
    }

    public function destroy(comment $comment){
        $comment->delete();
        return redirect()->back();
    }

    public function update(comment $comment , Request $request){
        if($request->action==1){
        $comment->update(['status'=>1]);
        return redirect()->back();
        dd('ok');
    }
        if($request->action ==2){
        $comment->update(['status'=>2]);
        return redirect()->back();
        }

        else{
        return redirect()->back();
        }
    }
}
