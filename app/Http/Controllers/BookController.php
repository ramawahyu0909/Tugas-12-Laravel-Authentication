<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    private function messages(): array
    {
        return [
            'title.required' => 'Judul buku wajib diisi.',
            'title.string' => 'Judul buku harus berupa teks.',
            'title.max' => 'Judul buku maksimal 255 karakter.',

            'author.required' => 'Nama penulis wajib diisi.',
            'author.string' => 'Nama penulis harus berupa teks.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',

            'year.required' => 'Tahun terbit wajib diisi.',
            'year.integer' => 'Tahun terbit harus berupa angka bulat.',
            'year.min' => 'Tahun terbit minimal tahun 1900.',

            'stock.required' => 'Stok buku wajib diisi.',
            'stock.integer' => 'Stok buku harus berupa angka bulat.',
            'stock.min' => 'Stok buku tidak boleh kurang dari 0.',

            'category_id.required' => 'Kategori buku wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
        ];
    }

    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $title = 'Tambah Buku';
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->rules(),
            $this->messages()
        );

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            $this->rules(),
            $this->messages()
        );

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
