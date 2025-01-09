<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('is_published', 1)->first();

        return 'post: '.$post->title;
    }

    public function create()
    {
        $posts = [
            [
                'title' => 'lshjnldtkhgpsornmsrfg',
                'content' => 'fgjnfmpodrjnihmyn;flmgpo4jn6o45ij640g9u459086hjo5hj95486gn4',
                'image' => 'image',
                'likes' => 15,
                'is_published' => 1,
            ],

            [
                'title' => 'test2',
                'content' => 'YOOOO',
                'image' => 'image',
                'likes' => 46457,
                'is_published' => 1,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
        dd('created');
    }

    public function update()
    {
        $post = Post::find(1);

        $post->update([
            'title' => 'updated',
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post = Post::find(1);
        $post->delete();
        dump('deleted');
        $post = Post::withTrashed()->find(1);
        $post->restore();
        dump('restored');
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
