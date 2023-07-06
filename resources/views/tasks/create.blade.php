@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px">{{ isset($task) ? 'Update The Task' : 'Create New Task'}}</h1>
    <form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
    @csrf
    @if(isset($task))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ isset($task) ? $task->title : old('title') }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ isset($task) ? $task->description : old('description') }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" style="background: #007bff">
            {{ isset($task) ? 'Update Task' : 'Create Task' }}
        </button>
    </div>
</form>

@endsection
