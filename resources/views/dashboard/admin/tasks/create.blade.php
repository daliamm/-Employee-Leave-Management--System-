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
                            <h3 class="card-title">Add Task</h3>
                        </div>
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <div style="padding: 50px;">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Task Title">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="6" placeholder="Content.."></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Available Users</h4>
                                            @forelse($users as $user)
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}">
                                                <span class="form-check-label">{{ $user->name }}</span>
                                            </label>
                                            @empty
                                            <p>No available users.</p>
                                            @endforelse
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Not Available Users</h4>
                                            @forelse($otherUsers as $user)
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled="">
                                                <span class="form-check-label">{{ $user->name }}</span>
                                            </label>
                                            @empty
                                            <p>No other users.</p>
                                            @endforelse
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
