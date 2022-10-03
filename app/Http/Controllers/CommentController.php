<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request , $post)
    {
        $post = Post::findOrFail($post);

        $comment = Comment::create([
            'comment' => $request->comment,
            'post_id' => $post->id,
            'user_id' => 47
        ]);

        $request->session()->flash("commentadded" , "<strong>Comment</strong> added successfuly..!");

        return redirect()->back();
    }
}
