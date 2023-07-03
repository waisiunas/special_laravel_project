@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Add Question</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('admin.questions') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash-messages')
                        <form action="{{ route('admin.question.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="subject_id" class="form-label">Subject</label>
                                <select name="subject_id" id="subject_id"
                                    class="form-select @error('subject_id') is-invalid @enderror">
                                    <option value="" selected>Select a subject</option>
                                    @foreach ($subjects as $subject)
                                        @if ($subject->id == old('subject_id'))
                                            <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                                        @else
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="topic_id" class="form-label">Topic</label>
                                <select name="topic_id" id="topic_id"
                                    class="form-select @error('topic_id') is-invalid @enderror">
                                    <option value="" selected>Select a topic</option>
                                    @foreach ($topics as $topic)
                                        @if ($topic->id == old('topic_id'))
                                            <option value="{{ $topic->id }}" selected>{{ $topic->name }}</option>
                                        @else
                                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('topic_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="text">Question Text</label>
                                <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="2">{{ old('text') }}</textarea>
                                @error('text')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @for ($i = 1; $i < 5; $i++)
                                <div class="mb-3">
                                    <label for="choice_{{ $i }}" class="form-label">Choice
                                        {{ $i }}</label>
                                    <input type="text" class="form-control @error('choice_' . $i) is-invalid @enderror"
                                        id="choice_{{ $i }}" name="choice_{{ $i }}"
                                        value="{{ old('choice_' . $i) }}" placeholder="Enter choice {{ $i }}!">
                                    @error('choice_' . $i)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endfor

                            <div class="mb-3">
                                <label for="correct_choice" class="form-label">Correct Choice</label>
                                <input type="text" class="form-control @error('correct_choice') is-invalid @enderror"
                                    id="correct_choice" name="correct_choice" value="{{ old('correct_choice') }}"
                                    placeholder="Enter correct choice!">
                                @error('correct_choice')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
