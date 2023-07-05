<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Select Topic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <main>
        @include('partials.pages.navbar')

        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-6 fw-bold text-center">Questions of {{ $topic->name }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @foreach ($topic->subject->topics as $single_topic)
                        <div class="card mb-2">
                            <div class="card-body">
                                <a href="{{ route('show.questions', $single_topic) }}">{{ $single_topic->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-9">
                    @if (count($topic->questions) > 0)
                        @foreach ($topic->questions as $question)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h5>{{ $question->text }}</h5>
                                            <ol>
                                                @foreach ($question->choices as $choice)
                                                    @if ($choice->is_correct == 1)
                                                        @php
                                                            $correct_choice = $choice->text;
                                                        @endphp
                                                    @endif
                                                    <li>{{ $choice->text }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-dark" onclick="showAnswer({{ $question->id }})">Show
                                                Answer</button>
                                        </div>

                                        <div class="d-none" id="question-{{ $question->id }}">{{ $correct_choice }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">No question found!</div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        function showAnswer(id) {
            const answerElement = document.querySelector('#question-' + id);
            answerElement.classList.toggle('d-none');
        }
    </script>
</body>

</html>
