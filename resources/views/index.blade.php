@extends('layouts.app')

@section('title', 'List of all tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
            class="link">
            Add task
        </a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['p-4', 'line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <p>No tasks found</p>
    @endforelse

    @if ($tasks->count())
        <nav class="mb-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
