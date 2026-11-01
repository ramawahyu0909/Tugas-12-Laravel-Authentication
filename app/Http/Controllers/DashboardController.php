<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $appName = 'Library System';
        $appDescription = 'Sistem Informasi Perpustakaan Sederhana untuk pengelolaan buku, kategori, dan anggota.';
        $totalBooks = 120;
        $totalMembers = 45;
        $totalCategories = 12;

        return view('dashboard.index', compact('appName', 'appDescription', 'totalBooks', 'totalMembers', 'totalCategories'));
    }
}