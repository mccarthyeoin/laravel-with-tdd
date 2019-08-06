@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-600 text-sm font-normal">
                <a class="text-grey text-sm font-normal no-underline" href="/projects">My Projects</a> / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -m-3 items-center">
            <div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>

                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input class="w-full @if ($task->completed) opacity-25 @endif" type="text" value="{{ $task->body }}" name="body">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" @if ($task->completed) checked @endif>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input class="w-full" type="text" placeholder="Add a new task" name="body">
                        </form>
                    </div>
                </div>
                <div>
                    <h2 class="text-grey font-normal text-lg mb-3">General Notes</h2>
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <textarea class="card w-full mb-4" style="min-height: 200px;" placeholder="Anything special that you want to take a note of?" name="notes">{{ $project->notes }}</textarea>

                        <button class="button">Save</button>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>
@endsection
