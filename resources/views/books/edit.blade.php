<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Buku</h2>

    @if ($errors->any())
        <p style="color: red;">Periksa kembali data yang kamu masukkan.</p>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="title">Judul Buku</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $book->title) }}"
                maxlength="255"
                required
            >
            @error('title')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="author">Penulis</label><br>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $book->author) }}"
                maxlength="255"
                required
            >
            @error('author')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="year">Tahun Terbit</label><br>
            <input
                type="number"
                id="year"
                name="year"
                value="{{ old('year', $book->year) }}"
                min="1900"
                required
            >
            @error('year')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="stock">Stok</label><br>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $book->stock) }}"
                min="0"
                required
            >
            @error('stock')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">Pilih kategori</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id', $book->category_id) == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <br><span style="color: red;">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('books.index') }}">Kembali</a>
    </form>
</body>
</html>
