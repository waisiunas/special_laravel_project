@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Add Topic</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('admin.topics') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash-messages')
                        <form action="{{ route('admin.topic.create') }}" method="post">
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter topic name!">
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
