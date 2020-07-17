@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-0">
    <div class="row justify-content-center pt-5">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <img class="user-profile-image rounded-circle" src="https://placedog.net/550/550" alt="user profile">
        </div>
        <div class="col-8">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="user-profile-username mb-0 pb-2">{{ $user->username }}</h1>
                <a class="btn btn-secondary" href="/post/create">Add new post</a>
            </div>
            <div class="user-profile-numbers d-flex">
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">{{ $user->posts->count() }}</strong>Publications</p>
                </div>
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">122</strong>Followers</p>
                </div>
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">12</strong>Following</p>
                </div>
            </div>
            <div class="user-profile-website pt-4"><p class="mb-0 font-weight-bold">{{ $user->profile->title }}</p></div>
            <div class="user-profile-info"><p class="mb-0">{{ $user->profile->description }}</p></div>
            <div class="user-profile-url"><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="grid pt-5">
        @foreach($user->posts as $post)
            <div class="grid-item">
                <img src="/storage/{{ $post->image }}" alt="#">
            </div>
        @endforeach
    </div>
</div>
@endsection
