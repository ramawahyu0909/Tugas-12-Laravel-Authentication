<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Pemrograman ',
                'author' => 'Rama Wahyu',
                'year' => 2023,
                'stock' => 10,
            ],
            [
                'title' => 'Pemograman Web Framework',
                'author' => 'Wijoko',
                'year' => 2024,
                'stock' => 7,
            ],
            [
                'title' => 'Laravel Dasar',
                'author' => 'Amaw',
                'year' => 2022,
                'stock' => 5,
            ],
            [
                'title' => 'Algoritma & Pemrograman',
                'author' => 'Joko Kendil',
                'year' => 2021,
                'stock' => 8,
            ],
            [
                'title' => 'Sistem Basis Data',
                'author' => 'Jaki',
                'year' => 2025,
                'stock' => 4,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}