<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);

        $post->update($data);

        $post->tags()->sync($tags);

        return $post->fresh();
    }
}
