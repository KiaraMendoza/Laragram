@extends('layouts.app')

@section('content')

<div class="container-lg post-detail">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="#">
        </div>
        <div class="col-4">
            <div class="post-user-info row align-items-center mb-3 mx-0">
                <img class="rounded-circle w-100 mr-3" src="{{ $post->user->profile->profileImage() }}" alt="#">
                <h3 class="font-weight-bold mb-0"><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></h3>
                <a class="follow font-weight-bold pl-2" href="#">Follow</a>
            </div>
            <hr>
            <p class="mb-0"> {{ $post->title }} </p>
            <p> {{ $post->description }} </p>
            <p>
                <a href="/profile/{{ $post->user->id }}">
                    <span class="font-weight-bold">{{ $post->user->username }}</span>
                </a> {{ $post->description }}
            </p>
        </div>
    </div>
</div>

@endsection
