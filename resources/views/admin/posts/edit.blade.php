@extends('layouts.dashboard')

@section('content')
<form action="{{ route('adminposts.update', ['post' => $post->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <h1>Crea un nuovo post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea type="content" class="form-control" id="content" name="content" rows="10">{{ old('content') ? old('content') : $post->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
