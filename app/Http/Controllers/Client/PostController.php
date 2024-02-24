<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show list post
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $posts = Post::get();

        return view('client.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show detail post
     *
     * @param integer $id post
     * @return \Illuminate\Contracts\View\View
     */
    public function detail ($id) {
        $post = Post::findOrFail($id);
        return view('client.post.detail', [
            'post' => $post,
        ]);
    }
}
