@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-0">
    <div class="row justify-content-center pt-5">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <img class="user-profile-image rounded-circle" src="https://placedog.net/550/550" alt="user profile">
        </div>
        <div class="col-8">
            <div><h1 class="user-profile-username">{{ $user->username }}</h1></div>
            <div class="user-profile-numbers d-flex">
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">302</strong>Publications</p>
                </div>
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">122</strong>Followers</p>
                </div>
                <div class="pr-4">
                    <p><strong class="profile-numbers pr-2">12</strong>Following</p>
                </div>
            </div>
            <div class="user-profile-website pt-4"><p class="mb-0 font-weight-bold">doggy-remaker.guau</p></div>
            <div class="user-profile-info"><p class="mb-0">We're a global community of millions of people learning to code together. We're an open source, donor-supported, 501(c)(3) nonprofit.</p></div>
            <div class="user-profile-url"><a href="#">doggy-remaker.guau</a></div>
        </div>
    </div>
    <div class="grid pt-5">
        <div class="grid-item"><img src="https://placedog.net/550/550" alt="#"></div>
        <div class="grid-item"><img src="https://placedog.net/550/550" alt="#"></div>
        <div class="grid-item"><img src="https://placedog.net/550/550" alt="#"></div>
    </div>
</div>
@endsection
