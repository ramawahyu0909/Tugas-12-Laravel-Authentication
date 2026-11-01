@extends('layouts.app')

@section('title', 'Kategori Buku')

@section('content')
    <h2>Kategori Buku</h2>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>
@endsection