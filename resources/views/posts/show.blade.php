@extends('master.layout')

@section('content')
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p>Kategori: {{ $post->category->name }}</p>
            @if ($post->image)
                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
            @else
                <p>No image available</p>
            @endif
            <p>{{ $post->body }}</p>
        </div>

        <div class="col-md-4">
            <h3>Related Posts</h3>
            <ul class="list-group">
                @foreach ($relatedPosts as $relatedPost)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                        <br>
                        <small>Kategori: {{ $relatedPost->category->name }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
