<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 10);

        $books = Book::with('author', 'ratings', 'category') // Memuat relasi 'author' dan 'ratings'
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('author', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })
            ->paginate($perPage);

        // Menambahkan rata-rata rating di koleksi
        $books->getCollection()->transform(function ($book) {
            $book->average_rating = $book->ratings->avg('rating'); // Menghitung rata-rata rating
            $book->voters = $book->ratings->count(); // Jumlah voters
            return $book;
        });


        return view('books.index', compact('books'));
    }
}
