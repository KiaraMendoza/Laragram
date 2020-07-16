@extends('layouts.app')

@section('content')
<div class="container-md px-4 px-lg-0">
    <form class="col-8 mx-auto" action="/post" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mx-0">
            <div class="form-group w-100">
                <label for="title" class="col-form-label">Title</label>

                <input id="title" type="text" 
                    class="form-control @error('title') is-invalid @enderror"  
                    name="title" value="{{ old('title') }}" 
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
                    name="description" value="{{ old('description') }}" 
                    required autocomplete="description" autofocus>
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
                <label for="image" class="col-form-label">Image</label>

                <input id="image" type="file" 
                    class="form-control-file @error('image') is-invalid @enderror"  
                    name="image" value="{{ old('image') }}" 
                    required autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mx-0">
            <button class="btn btn-primary" type="submit">Add new post</button>
        </div>
    </form>
</div>
@endsection