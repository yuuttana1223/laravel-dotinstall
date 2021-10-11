<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get("/", [PostController::class, "index"])
    ->name("posts.index");
Route::get("/posts/{post}", [PostController::class, "show"])
    ->name("posts.show")
    ->where("post", "[0-9]+");

Route::get("/posts/create", [PostController::class, "create"])
    ->name("posts.create");
Route::post("/posts/store", [PostController::class, "store"])
    ->name("posts.store");

Route::get("/posts/{post}/edit", [PostController::class, "edit"])
    ->name("posts.edit")
    ->where("post", "[0-9]+");
Route::patch("/posts/{post}/update", [PostController::class, "update"])
    ->name("posts.update")
    ->where("post", "[0-9]+");

Route::delete("/posts/{post}/destroy", [PostController::class, "destroy"])
    ->name("posts.destroy")
    ->where("post", "[0-9]+");

Route::post("/posts/{post}/comments", [CommentController::class, "store"])
    ->name("comments.store");

Route::delete("/comments/{comment}/destroy", [CommentController::class, "destroy"])
    ->name("comments.destroy")
    ->where("comment", "[0-9]+");
