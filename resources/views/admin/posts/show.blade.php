@extends('layouts.dashboard')

@section('content')
    <h1>
        {{ $post->title }}
    </h1>
    <p>
        <strong>Slug:</strong> {{ $post->slug }}
    </p>
    <p>
        <strong>Categoria:</strong> {{ $category ? $category->name : 'nessuna' }}
    </p>
    <p>
        {{ $post->content }}
    </p>
    <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
    <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Elimina post</button>
    </form>
@endsection