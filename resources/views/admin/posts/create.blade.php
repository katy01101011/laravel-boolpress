@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @method('POST')
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
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="category_id">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            @if ($tags->isNotEmpty())
                <h4>Tags</h4>
            @endif
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        id="tag-{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="content" class="form-control" id="content" name="content">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
