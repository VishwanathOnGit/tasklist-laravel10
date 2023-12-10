@extends('layouts.app')

@section('title', 'List of all tasks')

@section('content')
    @forelse ($tasks as $task)
        <li><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a></li>
    @empty
        <p>No tasks found</p>
    @endforelse

    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif
@endsection
