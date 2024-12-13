<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate a Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Rate a Book</h1>
        <a href="/books" class="btn btn-primary">Back to Home Page</a>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pilihan Author -->
        <form action="{{ route('ratings.index') }}" method="GET" class="mb-4">
            <label for="author" class="form-label">Pilih Author</label>
            <select name="author_id" id="author" class="form-select" onchange="this.form.submit()">
                <option value="">Pilih Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $request->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- Form Rating Buku -->
        @if (!empty($books))
            <form action="{{ route('ratings.rate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="book" class="form-label">Pilih Buku</label>
                    <select name="book_id" id="book" class="form-select" required>
                        <option value="">Pilih Buku</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Masukkan Rating (1-10)</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="10" required placeholder="Rate 1-10">
                </div>

                <button type="submit" class="btn btn-primary">Submit Rating</button>
            </form>
        @endif
    </div>
</body>
</html>
