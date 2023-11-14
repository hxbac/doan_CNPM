<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();

        return view('client.post.index', [
            'posts' => $posts
        ]);
    }

    public function detail ($id) {
        $post = Post::find($id);
        return view('client.post.detail', [
            'post' => $post,
        ]);
    }
}
