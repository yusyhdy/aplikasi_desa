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

    <!-- Carousel Section -->
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($newsPosts as $key => $newsPost)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $newsPost->image ? asset('images/posts/' . $newsPost->image) : 'https://via.placeholder.com/800x400' }}"
                         class="d-block w-50"
                         alt="{{ $newsPost->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $newsPost->title }}</h5>
                        <p>{{ Str::limit($newsPost->body, 150) }}</p>
                        <a href="{{ route('posts.show', $newsPost) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Posts Section -->
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
    var myCarousel = document.querySelector('#newsCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000,
        wrap: true
    });
</script>
@endsection
