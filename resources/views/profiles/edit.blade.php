@extends('layouts.app')

@section('content')
<div class="container-lg px-4 px-lg-0">
    <form class="col-8 mx-auto" action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row mx-0">
            <h3>Edit Profile</h3>
        </div>
        <div class="row mx-0">
            <div class="form-group w-100">
                <label for="title" class="col-form-label">Title</label>

                <input id="title" type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title" value="{{ old('title') ?? $user->profile->title }}"
                    required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mx-0">
            <div class="form-group w-100">
                <label for="description" class="col-form-label">Description</label>

                <textarea id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    required autocomplete="description" autofocus
                >{{ old('description') ?? $user->profile->description }}
                </textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mx-0">
            <div class="form-group w-100">
                <label for="url" class="col-form-label">Url</label>

                <input id="url" type="text"
                    class="form-control @error('url') is-invalid @enderror"
                    name="url" value="{{ old('url') ?? $user->profile->url }}"
                    required autocomplete="url" autofocus>

                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mx-0">
            <div class="form-group w-100">
                <label for="image" class="col-form-label">Profile image</label>

                <input id="image" type="file"
                    class="form-control-file @error('image') is-invalid @enderror"
                    name="image" value="{{ old('image') ?? $user->profile->image }}"
                    autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mx-0">
            <button class="btn btn-primary" type="submit">Save profile</button>
        </div>
    </form>
</div>
@endsection
