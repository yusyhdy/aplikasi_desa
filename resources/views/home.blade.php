@extends('master.layout')

@section('title')
Home
@endsection

@section('content')
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Selamat Datang di halaman Beranda aplikasi</h2>
        </div>
    </div>

    {{-- Carousel --}}
    <div id="slideShow" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($posts as $index => $post)
                <li data-target="#slideShow" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($posts as $index => $post)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    @if ($post->image)
                        <img src="{{ asset('images/posts/' . $post->image) }}" height="400" width="1140" class="d-block w-100" alt="{{ $post->title }}">
                    @else
                        <img src="https://via.placeholder.com/1140x400" class="d-block w-100" alt="Placeholder Image">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $post->title }}</h5>
                        <p>{{ Str::limit($post->body, 100) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#slideShow" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slideShow" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row mt-4">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if ($post->image)
                    <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                @else
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Placeholder Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Inisialisasi carousel
    $('.carousel').carousel();
</script>
@endsection
