<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>

        <!-- Filter dan Pencarian -->
        <form method="GET" action="{{ route('books.index') }}" class="d-flex justify-content-between mb-3">
            <div class="input-group w-50">
                <input type="text" name="search" class="form-control" placeholder="Cari buku atau penulis" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
            <div>
                <select name="perPage" class="form-select" onchange="this.form.submit()">
                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <a href="/top-authors" class="btn btn-warning">Top Author</a>
            <a href="/ratings" class="btn btn-success">Rating</a>
        </form>

        <!-- Daftar Buku -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Rata-rata Rating</th>
                    <th>Voters</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $index => $book)
                <tr>
                    <td>{{ $books->firstItem() + $index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? 'Tidak Ada Kategori' }}</td>
                    <td>{{ $book->author->name ?? 'Tidak Ada Penulis' }}</td>
                    <td>{{ number_format($book->average_rating, 1) }}</td>
                    <td>{{ $book->voters }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data buku</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>

    <!-- Link Bootstrap JS (Opsional untuk interaksi JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
