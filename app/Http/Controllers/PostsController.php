<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        //WIP : $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5); // latest() = .orderBy('created_at', 'DESC'); // 'user' is the relationship between the posts and their users.

        return view('posts/index', compact('posts'));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required', 'image'],
        ]);

        // IMPORTANT: If we have a not-validated input on the validation data above, it would be ignored on the create method if we only pass $data,
        // to avoid that we can simple 'validate' it with an empty string like:
        // 'something' => '',

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
        ]); // Add user_id on the post table we are creating using the current authenticated user.

        return redirect('/profile/' . auth()->user()->id);
    }
    public function show(\App\Post $post)
    {
        return view('posts/show', compact('post'));
    }
}
