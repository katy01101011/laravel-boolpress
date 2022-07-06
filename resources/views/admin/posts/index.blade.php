@extends('layouts.dashboard')

@section('content')
    <h1>
        Lista dei tuoi post
    </h1>

    <div class="row row-cols-4">
        @foreach ($posts as $post)
            {{-- Single post --}}
            <div class="col">
                <div class="card mb-4" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{ route('adminposts.show', ['post' => $post->id]) }}" class="btn btn-primary">Leggi post</a>
                    </div>
                </div>
            </div>
            {{-- Single post --}}
        @endforeach
    </div>
@endsection
