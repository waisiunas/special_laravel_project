@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-3">Subjects</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('admin.subject.create') }}" class="btn btn-outline-primary">Add Subject</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash-messages')
                        @if (count($subjects) > 0)
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Topics</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->slug }}</td>
                                            <td>{{ count($subject->topics) }}</td>
                                            <td>
                                                <a href="{{ route('admin.subject.edit', $subject) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin.subject.destroy', $subject) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger mb-0">No record found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
