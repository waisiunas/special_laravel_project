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
                        @else
                            <div class="alert alert-danger mb-0">No record found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
