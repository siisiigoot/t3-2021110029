@extends('layouts.master') @section('title', 'Tambah data penulis') @section('content')
<h2>Tambah data penulis</h2>
<form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <div class="row">
        {{-- <div class="col-md-3 mb-3">
            <label for="id">ID</label>
            <input
                type="text"
                class="form-control @error('id') is-invalid @enderror"
                name="id"
                id="id"
                value="{{ old('id') }}">
            @error('id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="col-md-6 mb-3">
            <label for="nama">Nama</label>
            <input
                type="text"
                class="form-control @error('judul') is-invalid @enderror"
                name="nama"
                id="nama"
                value="{{ old('nama') ?? $randomName }}">
            @error('nama')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="negara">Negara</label>
            <input
            type="text"
            class="form-control @error('judul') is-invalid @enderror"
            name="negara"
            id="negara"
            value="{{ old('negara') ?? $randomCountry }}">
        @error('negara')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
</form>
@endsection