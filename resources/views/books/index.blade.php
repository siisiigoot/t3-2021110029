@extends('layouts.master') 

@section('title','Daftar buku') 

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content') 
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Daftar Buku</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('books.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>
                                Tambah data</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>id</th> --}}
                        <th>Judul</th>
                        <th>Halaman</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <th scope="row" style="width: 5%">{{ $loop->iteration }}</th>
                        {{-- <td>{{ $book->id }}</td> --}}
                        <td style="width: 40%">{{ $book->judul }}</td>
                        <td style="width: 10%">{{ $book->halaman }}</td>
                        <td style="width: 15%">{{ $book->kategori }}</td>
                        <td style="width: 15%">{{ $book->penerbit }}</td>
                        <td style="width: 25%">
                            <a href="{{ route('books.show', $book->id) }}">
                                Lihat detil
                            </a>
                            {{-- <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                @method('DELETE') @csrf
                            </form> --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td align="center" colspan="6">No data yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection