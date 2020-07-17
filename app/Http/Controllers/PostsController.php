<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
