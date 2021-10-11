<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            "body" => "required",
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route("posts.show", $post);
    }

    public function destroy(Comment $comment)
    {
        // databaseでは削除されているが、$commentはスコープ内では使える
        $comment->delete();

        return redirect()
            ->route("posts.show", $comment->post);
    }
}
