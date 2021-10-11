<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view("index")
            ->with(["posts" => $posts]);
    }

    public function show(Post $post)
    {
        return view("posts.show")
            ->with([
                "post" => $post,
                "comments" => $post->comments()->latest()->get()
            ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route("posts.index");
    }

    public function edit(Post $post)
    {
        return view("posts.edit")
            ->with(["post" => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route("posts.index");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route("posts.index");
    }
}
