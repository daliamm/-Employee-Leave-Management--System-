@extends('dashboard.master')

@section('content')

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <!-- Page header content goes here -->
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Task</h3>
                        </div>
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                                <div style="padding: 50px;">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="6">{{ $task->description }}</textarea>
                                    </div>

                                    {{-- CheckBox --}}
                                    <div class="row">
                                        <label class="col-3 col-form-label pt-0">Select Employee For This Task</label>
                                        <div class="col">
                                            @forelse($users as $user)
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}" @if(in_array($user->id, $selectedUsers)) checked @endif>
                                                <span class="form-check-label">{{ $user->name }}</span>
                                            </label>
                                            @empty
                                            <p>No users available.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Include footer -->
    @include('dashboard.layouts.footer')
</div>

@endsection
