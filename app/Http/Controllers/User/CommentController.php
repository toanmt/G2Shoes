<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){
        if ($request->rating =='') {
            return response()->json(['error'=>'Sản phẩm cần được đánh giá']);
        }
        if ($request->author =='') {
            return response()->json(['error'=>'']);
        }
        if ($request->content =='') {
            return response()->json(['error'=>'']);
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
                    'message'=> 'Đánh giá sản phẩm thành công',
                    'product_id'=>$request->productId,
                    'author'=>$request->author,
                    'content'=>$request->content,
                    'rating'=>$request->rating,
                ]
            );
        } 
    }
}
