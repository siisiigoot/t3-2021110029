@extends('layouts.master') @section('title', 'Ubah data penulis')
@section('content')
<h2>Ubah data penulis</h2>
<form action="{{ route('authors.update', ['author'=>$author->id]) }}" method="POST">
@method('PATCH') 
@csrf
<div class="row">
<div class="col-md-3 mb-3">
    <label for="id">ID</label>
    <input
        type="text"
        class="form-control @error('id') is-invalid @enderror"
        name="id"
        id="id"
        value="{{ old('id') ?? $author->id }}">
    @error('id')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<div class="col-md-6 mb-3">
    <label for="nama">Nama</label>
    <input
        type="text"
        class="form-control @error('nama') is-invalid @enderror"
        name="nama"
        id="nama"
        value="{{ old('nama') ?? $author->nama }}">
    @error('nama')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-3 mb-3">
    <label for="negara">Negara</label>
    <input
        type="text"
        class="form-control @error('negara') is-invalid @enderror"
        name="negara"
        id="negara"
        value="{{ old('negara') ?? $author->negara }}">
    @error('negara')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

</div>
<button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
</form>
@endsection