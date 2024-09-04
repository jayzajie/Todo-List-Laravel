@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary">Edit Task</h2>
            <a class="btn btn-secondary" href="{{ route('tasks.index') }}">Back to List</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label"><strong>Title:</strong></label>
                <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Task Title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description:</strong></label>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Task Description">{{ $task->description }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-custom">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
