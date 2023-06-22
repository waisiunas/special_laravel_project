@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Edit Subject</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('admin.subjects') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash-messages')
                        <form action="{{ route('admin.subject.edit', $subject) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    value="{{ old('name') ?? $subject->name }}" placeholder="Enter subject name!">
                                @error('name')
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
