<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Book;

class BooksController extends BaseController
{
    public function showBooks()
    {
        $books = Book::all();

        // dd($books);
        /*
        foreach ($books as $book) {
            echo $book->title . "<br>";
            echo $book->author . "<br>";
            echo $book->image . "<br>";
            echo "<br>";
        }
        */

        return view('books', compact("books"));
    }
}
