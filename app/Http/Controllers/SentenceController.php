<?php

namespace App\Http\Controllers;

class SentenceController extends Controller
{
    public function all()
    {
        return response()->json([
            'sentence' => 'En slumpad mening.',
            'book' => [
                'name' => 'Boken',
                'year' => '2010',
                'id' => '1'
            ]
        ]);
    }

    public function book($book)
    {
        return response()->json([
            'sentence' => 'En ANNAN slumpad mening.',
            'book' => [
                'name' => $book,
                'year' => '2010',
                'id' => rand(1,10)
            ]
        ]);
    }
}
