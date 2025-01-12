<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(15)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(150)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }
    }
}
