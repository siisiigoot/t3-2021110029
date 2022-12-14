@extends('layouts.master') @section('title', $book->judul) @section('content')
<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @method('DELETE') @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <h2>
        Judul buku : {{ $book->judul }}
    </h2>
    <p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>Jumlah halaman : {{ $book->halaman }},</em>
            </li>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                Kategori : {{ $book->kategori }},
            </li>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                Penerbit : {{ $book->penerbit }}
            </li>
        </ul>
    </p>
    <p class="lead">Deskripsi : Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iste quaerat, nulla tempore, rem, laudantium officia minus illum perferendis voluptatem labore id pariatur architecto maiores reiciendis laboriosam temporibus perspiciatis vero? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam omnis illum voluptatem, repudiandae ipsum explicabo neque molestias ad ipsa, libero ut enim aspernatur nam cum aperiam veritatis expedita tempore! Magnam?</p>
</main>
@endsection