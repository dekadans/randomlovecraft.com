<?php

namespace App\Http\Controllers;

use App\ApiActivity;
use App\Book;
use App\Http\Resources\Sentence as SentenceResource;
use App\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    private $numberOfResults;

    public function __construct(Request $request)
    {
        $this->numberOfResults = is_numeric($request->input('n')) ? (int)$request->input('n') : 1;
        $this->numberOfResults = min($this->numberOfResults, 100);
    }

    public function all()
    {
        $sentences = Sentence::inRandomOrder()->with('book')->limit($this->numberOfResults)->get();
        return SentenceResource::collection($sentences);
    }

    public function book($bookId)
    {
        $book = Book::where('uuid', $bookId)->first();

        $sentences = $book->sentences()->inRandomOrder()->with('book')->limit($this->numberOfResults)->get();

        return SentenceResource::collection($sentences);
    }
}
