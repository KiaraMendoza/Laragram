@extends('layouts.app')

@section('content')

<div class="container-lg post-detail">
    @foreach ($posts as $post)
       <div class="post-single col-12 col-md-8 mb-5 mx-auto">
           <div class="row justify-content-center">
                <div class="">
                    <img src="/storage/{{ $post->image }}" alt="#">
                </div>
            </div>
            <div class="mt-3 p-3">
                <div class="post-user-info row align-items-center mb-3 mx-0">
                    <a class="d-flex align-items-center" href="/profile/{{ $post->user->id }}"
                        ><img class="rounded-circle w-100 mr-3" src="{{ $post->user->profile->profileImage() }}" alt="#">
                        <h3 class="font-weight-bold mb-0">{{ $post->user->username }}</h3>
                    </a>
                    <div class="follow-button-container" data-userId="{{ $post->user->id }}"></div>
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
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
