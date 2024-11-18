@extends('master.layout')

@section('content')
<div class="container" style="padding-top: 100px;">
    <h1>Daftar Postingan</h1>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('posts') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan judul..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="paginationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $posts->perPage() }} per halaman
                </button>
                <ul class="dropdown-menu" aria-labelledby="paginationDropdown">
                    <li><a class="dropdown-item" href="{{ $posts->url(1) . '?per_page=10' }}">10 per halaman</a></li>
                    <li><a class="dropdown-item" href="{{ $posts->url(1) . '?per_page=25' }}">25 per halaman</a></li>
                    <li><a class="dropdown-item" href="{{ $posts->url(1) . '?per_page=50' }}">50 per halaman</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tambah Postingan</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        @if ($post->image)
                            <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-thumbnail" width="100">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $posts->appends(request()->query())->links() }}
    </div>
</div>
@endsection
