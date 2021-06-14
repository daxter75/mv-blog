<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        auth()->user()->isEditor() ?
            $posts = Post::latest()->paginate(10) :
            $posts = Post::where('author_id', auth()->id())->latest()->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts,slug',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        $attributes['author_id'] = auth()->id();
        $attributes['published_at'] = now();

        return Post::create($attributes) ?
            redirect('/admin/posts')->with('success', 'New post added') :
            redirect('/admin/posts')->with('success', 'You didn\'t create new post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $author = User::where('id', $post->author_id)->first()->name;
        return view('admin.posts.show', [
            'post' => $post,
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        if ($post->author_id == auth()->id() || auth()->user()->isEditor()) {
            return view('admin.posts.edit', [
                'post' => $post,
            ]);
        }

        return back()->with('success', 'You can\'t edit this post');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;

        $message = $post->save() ? 'Updated post' : 'Not updated post';

        return redirect('/admin/posts')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $message = $post->delete() ? 'Post deleted' : 'Post not deleted';

        return redirect('admin/posts')->with('success', $message);
    }
}
