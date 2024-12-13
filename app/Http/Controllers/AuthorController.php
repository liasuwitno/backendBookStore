<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorController extends Controller
{
    public function topAuthors()
    {
        $authors = Author::select(
                'authors.name', 
                DB::raw('AVG(ratings.rating) as avg_rating'), 
                DB::raw('COUNT(DISTINCT books.id) as book_count'),
                DB::raw('SUM(CASE WHEN ratings.rating > 5 THEN 1 ELSE 0 END) as voters') // Jumlah voters > 5
            )
            ->join('books', 'books.author_id', '=', 'authors.id')
            ->join('ratings', 'ratings.book_id', '=', 'books.id')
            ->groupBy('authors.id')
            ->orderByDesc('avg_rating')
            ->take(10)
            ->get();

        return view('books.author', compact('authors'));
    }
}
