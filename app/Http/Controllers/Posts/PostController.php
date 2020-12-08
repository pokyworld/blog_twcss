<?php

namespace App\Http\Controllers\Posts;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $posts = Post::get();
        // return view('posts.index')->with($posts);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        // Post::create([
        //     // 'user_id' => auth()->user()->id,
        //     'user_id' => auth()->id,
        //     'body' => $request->body,
        // ]);

        // $request->user()->posts()->create([
        //     'body' => $request->body,
        // ]);

        // $request->user()->posts()->create($request->only('body'));
        
        // auth()->user()->posts()->create([
            //     'body' => $request->body,
            // ]);
            
        auth()->user()->posts()->create($request->only('body'));

        return back();

    }
}
