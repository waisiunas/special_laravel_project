@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Questions</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('admin.question.create') }}" class="btn btn-outline-primary">Add Question</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash-messages')
                        @if (count($questions) > 0)
                            @foreach ($questions as $question)
                                <div class="card m-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6"><h4>Subject: {{ $question->topic->subject->name }}</h4></div>
                                            <div class="col-6"><h4>Topic: {{ $question->topic->name }}</h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h5>{{ $question->text }}</h5>
                                                <ol class="m-0">
                                                    @foreach ($question->choices as $choice)
                                                        @if ($choice->is_correct == 1)
                                                            <li>{{ $choice->text }} (Correct)</li>
                                                        @else
                                                            <li>{{ $choice->text }}</li>
                                                        @endif
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{ route("admin.question.edit", $question) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route("admin.question.destroy", $question) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger mb-0">No record found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
