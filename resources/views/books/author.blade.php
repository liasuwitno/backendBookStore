<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Top Authors</h1>
        <a href="/books" class="btn btn-info">Back Home</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penulis</th>
                    <th>Jumlah Buku</th>
                    <th>Jumlah Voters (> 5)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $index => $author)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->book_count }}</td>
                        <td>{{ $author->voters }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
