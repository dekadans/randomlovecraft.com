@extends('layouts.app')

@section('content')
    <div class="cover-container w-100 h-100 p-3 mx-auto">
        @include('header')


        <main role="main" id="apiDocs" class="my-5">
            <h1>API</h1>

            <h2>Endpoints</h2>

            <h3>Fetch a random sentence</h3>
            <p>
                <code>GET /api/sentences</code>
            </p>
            <p>
                The number of results can be specified by setting the query string parameter <var>limit</var> to an integer with a value between 1 (default) and 100, e.g.:<br>
                <code>GET /api/sentences?limit=10</code>
            </p>

            <h3>Fetch a random sentence from a specific book</h3>
            <p>
                <code>GET /api/books/{id}/sentences</code><br>
                or <br>
                <code>GET /api/books/{id}/sentences?limit=10</code>
            </p>

            <h3>Fetch a specific sentence</h3>
            <p>
                <code>GET /api/sentences/{id}</code>
            </p>

            <h3>Fetch all books</h3>
            <p>
                <code>GET /api/books</code>
            </p>

            <h2>Response objects</h2>
            <h3>Sentence</h3>
            <pre><code>{
    "id": "string",
    "sentence": "string",
    "book": "Book"
}</code></pre>

            <h3>Book</h3>
            <pre><code>{
    "id": "string",
    "name": "string",
    "year": "string"
}</code></pre>
        </main>
    </div>
@endsection
