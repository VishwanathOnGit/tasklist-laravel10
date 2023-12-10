@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            &larr; Go back
        </a>
    </nav>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">>{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">
        Created {{ $task->created_at->diffForHumans() }} &middot; Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    <p class="mb-4">
        <span
            class="font-medium text-{{ $task->completed ? 'green' : 'red' }}-500">
            {{ $task->completed ? 'Completed' : 'Incomplete' }}
        </span>
    </p>

    <div class="flex gap-2">
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'Incomplete' : 'completed' }}
            </button>
        </form>

        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
