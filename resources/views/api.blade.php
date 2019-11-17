@extends('layouts.app')

@section('content')
    <div class="cover-container w-100 h-100 p-3 mx-auto">
        @include('header')


        <main role="main" class="my-5">
            <pre><code>$ curl https://randomlovecraft.com/api/sentences</code></pre>
            <pre><code>$ curl https://randomlovecraft.com/api/sentences/{id}</code></pre>
            <pre><code>$ curl https://randomlovecraft.com/api/books</code></pre>
            <pre><code>$ curl https://randomlovecraft.com/api/books/{id}/sentences</code></pre>
        </main>
    </div>
@endsection
