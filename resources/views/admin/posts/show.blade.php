@extends('layouts.dashboard')

@section('content')
    <h1>
        {{ $post->title }}
    </h1>
    <p>
        <strong>Creato il </strong>{{ $post->created_at->format('d F Y')  }} alle ore {{ $post->created_at->format('H:m')  }}
    </p>

    @if ($post->created_at == $post->updated_at)
        <p>
            Il post non è mai stato modificato
        </p>
    @else
        <p v-if='$post->created_at == $post->updated_at'>
            <strong>Modificato </strong>{{ $updated_mins_ago < 60 ? $updated_mins_ago . ' minuti fa' : 'il ' . $post->updated_at->format('d F Y')  }}{{ $updated_mins_ago > 60 ? ' alle ore ' . $post->updated_at->format('H:m') : '' }}
        </p>
    @endif

    <p>
        <strong>Slug:</strong> {{ $post->slug }}
    </p>
    <p>
        <strong>Categoria:</strong> {{ $category ? $category->name : 'nessuna' }}
    </p>
    {{-- Tags --}}
    @if ($post->tags->isNotEmpty())
        <h4>
            Tags:
        </h4>
    @endif
    <ul>
        @foreach ($post->tags as $tag)
            <li>
                {{ $tag->name }}
            </li>
        @endforeach
    </ul>
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
