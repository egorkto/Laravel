<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'category_id' => '',
            'tag_ids' => '',
        ]);
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);

        $post->update($data);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
