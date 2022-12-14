@extends('layouts.master') 

@section('title','Daftar penulis') 

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
                        <h2>Daftar Penulis</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('authors.create') }}" class="btn btn-success">
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
                        <th>Nama</th>
                        <th>Negara</th>
                        <th>Jumlah Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allAuthors as $author)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- <td style="width: 5%">{{ $author->id }}</td> --}}
                        <td style="width: 20%">{{ $author->nama }}</td>
                        <td>{{ $author->negara }}</td>
                        <td>{{ $author->books_count }}</td>
                        <td style="width: 20%">
                            <a href="{{ route('authors.show', $author->id) }}">
                                Detil
                            </a> | 
                            <a href="{{ route('authors.edit', $author->id) }}">
                                Ubah
                            </a>
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