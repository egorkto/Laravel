<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
        ]);
        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'New',
            'content' => 'GGGGGGG45454545454',
            'image' => 'image',
            'likes' => 769679,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'New',
        ], [
            $anotherPost,
        ]);
        dump($post->content);
        dd('created');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'New',
            'content' => 'GGGGGGG45454545454',
            'image' => 'image',
            'likes' => 769679,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'New',
        ], [
            'title' => 'New',
            'content' => 'new new GGGGGGG45454545454',
            'image' => 'image',
            'likes' => 769679,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd('created');
    }
}
