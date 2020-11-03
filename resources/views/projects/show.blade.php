@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <p class="text-gray-600 font-normal text-sm">
                <a href="/projects">My Projects</a> / {{ $project->title  }}
            </p>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-2">
                <div class="mb-8">
                    <h2 class="text-gray-600 font-normal text-lg mb-3">Tasks</h2>
                    {{-- Tasks --}}
                    @foreach($project->tasks as $task)
                        <div class="card mb-3">{{ $task->body }}</div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks'  }}" method="POST">
                            @csrf
                            <input id="body"
                                   name="body"
                                   type="text"
                                   placeholder="Add a new task"
                                   class="w-full">
                        </form>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-600 font-normal text-lg mb-3">General Notes</h2>
                    {{--General Notes--}}
                    <textarea class="card w-full" style="min-height: 200px;">Lorem Ipsum</textarea>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>
@endsection
