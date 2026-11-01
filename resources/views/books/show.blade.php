
@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>

    <p>ID Buku: <strong>{{ $book->id }}</strong></p>
    <p>Judul Buku: <strong>{{ $book->title }}</strong></p>
    <p>Penulis: <strong>{{ $book->author }}</strong></p>
    <p>Tahun Terbit: <strong>{{ $book->year }}</strong></p>
    <p>Stok: <strong>{{ $book->stock }}</strong></p>

    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
@endsection