@extends('layouts.app')

@section('content')

<div class="container-lg">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="#">
        </div>
        <div class="col-4">
            <h3>{{ $post->user->username }}</h3>
            <p class="mb-0"> {{ $post->title }} </p>
            <p> {{ $post->description }} </p>
        </div>
    </div>
</div>

@endsection
