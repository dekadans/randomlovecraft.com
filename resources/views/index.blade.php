@extends('layouts.app')

@section('content')
    <div id="app" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        @include('header')
        <main role="main" class="inner cover my-4">
            <Sentence
                v-if="initiated && mode === 'sentence'"
                :text="sentence.sentence"
                :book="sentence.book.name"
                :year="sentence.book.year">
            </Sentence>
            <Longform
                v-if="initiated && mode === 'text'"
                :paragraphs="paragraphs"
                :max="maxNumberOfParagraphs"
                @add-paragraph="refreshText()">
            </Longform>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <Switcher @mode="mode = $event"></Switcher>

                <Refresh :refresh-texts="refresh"></Refresh>
            </div>
        </footer>
    </div>

    <script>
        const apiKey = '{{ $apiKey  }}';
    </script>
    <script src="/components/components.js" defer></script>
@endsection
