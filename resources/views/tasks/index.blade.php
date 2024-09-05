@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary">Your TodoList</h2>
            <form action="{{ route('tasks.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search tasks" value="{{ request()->query('search') }}">
                <button class="btn btn-custom ms-2" type="submit">Search</button>
            </form>
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#createTaskModal">
                + Add New Task
            </button>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Title:</strong></label>
                        <input type="text" name="title" class="form-control" placeholder="Task Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description:</strong></label>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Task Description"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Completed At</th>
                    <th class="text-center" width="250px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="{{ $task->is_completed ? 'table-success' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d-m-Y H:i:s') }}</td>
                    <td>
                        @if ($task->completed_at)
                            {{ \Carbon\Carbon::parse($task->completed_at)->format('d-m-Y H:i:s') }}
                        @else
                            Not Completed
                        @endif
                    </td>
                    <td class="text-center">
                        @if(!$task->is_completed)
                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Complete</button>
                            </form>
                        @else
                            <span class="badge bg-success">Completed</span>
                        @endif

                        <button type="button" class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editTaskModal{{ $task->id }}"
                                @if($task->is_completed) disabled @endif>
                            Edit
                        </button>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel{{ $task->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTaskModalLabel{{ $task->id }}">Edit Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title" class="form-label"><strong>Title:</strong></label>
                                        <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Task Title" required @if($task->is_completed) readonly @endif>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label"><strong>Description:</strong></label>
                                        <textarea class="form-control" style="height:150px" name="description" placeholder="Task Description" @if($task->is_completed) readonly @endif>{{ $task->description }}</textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-custom" @if($task->is_completed) disabled @endif>Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
