<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);

            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();

            return $ex->getMessage();
        }

        return $post;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];

            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIdsWithUpdate($tags);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();

            return $ex;
        }

        return $post->fresh();
    }

    private function getCategoryId($item)
    {
        $category = isset($item['id']) ? Category::find($item['id']) : Category::create($item);

        return $category->id;
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = isset($tag['id']) ? Tag::find($tag['id']) : Tag::create($tag);
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        $category = '';
        if (isset($item['id'])) {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        } else {
            $category = Category::create($item);
        }

        return $category->id;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tagArr) {
            $tag = '';
            if (isset($tagArr['id'])) {
                $tag = Tag::find($tagArr['id']);
                $tag->update($tagArr);
                $tag->fresh();
            } else {
                $tag = Tag::create($tagArr);
            }
            $tagIds[] = $tag->id;

        }

        return $tagIds;
    }
}
