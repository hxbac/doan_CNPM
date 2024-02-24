<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $posts = Post::get();
        return view("admin.post.index", [
            "listPost" => $posts
        ]);
    }

    /**
     * Show form create post
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.post.create");
    }

    /**
     * Handle create post
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $imgPath = $this->uploadFile($request->file('image'), 'post');
        Post::create([
            "title" => $request->title,
            "image" => $imgPath,
            "content" =>$request->content,
            "author" =>$request->author
        ]);
        return redirect()->route('admin.post.index');
    }

    /**
     * Show form edit post
     *
     * @param integer $id post
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.post.edit",[
            "itemPost" => $post
        ]);
    }

    /**
     * Handle update post
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->title = $request->title;
        if ($request->changeImage) {
            $imgPath = $this->uploadFile($request->file('image'), 'post');
            $post->image = $imgPath;
        }
        $post->content = $request->content;
        $post->author = $request->author;

        $post->save();

        return redirect()->route('admin.post.index');
    }

    /**
     * Handle delete post
     *
     * @param integer $id post
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
