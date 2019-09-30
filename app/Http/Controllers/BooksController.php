<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\Book as BookResource;

class BooksController extends Controller
{
    public function listBooks()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }
}
