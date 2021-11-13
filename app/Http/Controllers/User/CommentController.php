<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){
        if ($request->author =='') {
            return response()->json(['error'=>'Full name cannot be left blank!']);
        }
        if ($request->content =='') {
            return response()->json(['error'=>'Details content cannot be left blank!']);
        }
        if ($request->rating =='') {
            return response()->json(['error'=>'Rating cannot be left blank!']);
        }
        else {
            $comment=new Comment();
            $comment->author = $request->author;
            $comment->content = $request->content;
            $comment->rating = $request->rating;
            $comment->product_id = $request->productId;
            $comment->save();
            return response()->json(
                [
                    'success'=>'true',
                    'message'=> 'Your review has been update!',
                    'product_id'=>$request->productId,
                    'author'=>$request->author,
                    'content'=>$request->content,
                    'rating'=>$request->rating,
                ]
            );
        } 
    }
}