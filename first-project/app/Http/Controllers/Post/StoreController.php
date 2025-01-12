<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => '',
            'tag_ids' => '',
        ]);
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('posts.index');
    }
}
