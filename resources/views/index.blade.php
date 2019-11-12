<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Random Lovecraft</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="/components/components.js" defer></script>
</head>

<body class="text-center">
    <div id="app" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Random Lovecraft</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#">API</a>
                    <a class="nav-link" href="#">About</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover my-4">
            <Sentence
                v-if="initiated && mode === 'sentence'"
                v-bind:text="sentence.sentence"
                v-bind:book="sentence.book.name"
                v-bind:year="sentence.book.year">
            </Sentence>
            <Longform
                v-if="initiated && mode === 'text'"
                v-bind:paragraphs="paragraphs">
            </Longform>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <Switcher v-on:mode="mode = $event"></Switcher>

                <Refresh v-bind:refresh-texts="refreshSentence"></Refresh>
            </div>
        </footer>
    </div>
</body>
</html>
