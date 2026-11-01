<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Andi Pratama',
            'Budi Santoso',
            'Citra Lestari',
            'Dewi Kusuma',
            'Eko Saputra'
        ];

        return view('members.index', compact('members'));
    }
}