@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>{{ $appName }}</h2>
    <p>{{ $appDescription }}</p>

    <h3>Statistik Perpustakaan</h3>
    <ul>
        <li>Total Koleksi Buku: {{ $totalBooks }}</li>
        <li>Total Anggota Terdaftar: {{ $totalMembers }}</li>
        <li>Total Kategori: {{ $totalCategories }}</li>
    </ul>
@endsection