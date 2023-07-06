
@extends('layouts.app')

@section('content')
    <h1>Task Details</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $task->title }}</h2>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
        </div>
    </div>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">Back to Task List</a>
@endsection
