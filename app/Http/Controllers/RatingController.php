<?php
namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function showRatings(Request $request)
    {
        $authors = Author::all();
        $books = [];

        // Jika author dipilih, ambil daftar buku
        if ($request->has('author_id')) {
            $books = Book::where('author_id', $request->author_id)->get();
        }

        return view('books.rating', compact('authors', 'books', 'request'));
    }

    public function rateBook(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }
}
