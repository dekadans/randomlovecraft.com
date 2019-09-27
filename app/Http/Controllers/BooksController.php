<?php

namespace App\Http\Controllers;

class BooksController extends Controller
{
    public function listBooks()
    {
        return response()->json(
            [
                [
                    'name' => 'Boken',
                    'year' => '2010',
                    'id' => '1'
                ],
                [
                    'name' => 'Boken 2: Uppföljaren',
                    'year' => '2014',
                    'id' => '2'
                ]
            ]
        );
    }
}
