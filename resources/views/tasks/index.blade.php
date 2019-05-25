@extends('layouts.layout')

@section('content')
    <div class="has-background-grey-lighter is-page-container">
        <div class="container flex-column">
            <div class="inner-space">
                <h1 class="title">All Tasks</h1>
            </div>   
            @if ($tasks->count() > 0) 
                <div class="inner-space">
                    <ul class="list is-hoverable">
                        @foreach ($tasks as $task)
                            <li href="/tasks/{{ $task->id }}" class="list-item has-background-grey-dark has-text-white-ter">
                                {{ $task->title }}
                                <form action="{{ !$task->trashed() ? '/tasks/'. $task->id : '/trashed-tasks/'.$task->id }}" method="POST" class="is-pulled-right">
                                    @csrf 
                                    @method('DELETE')
                                    @if (!$task->trashed())
                                        <button class="btn-link has-text-danger"><i class="fa fa-trash"></i></button>
                                    @else 
                                        <button class="btn-link has-text-danger">Delete</button>
                                    @endif
                                </form>
                                @if (!$task->trashed())
                                    <a href="/tasks/{{ $task->id }}/edit" style="margin-right: 1rem" class="is-pulled-right"><i class="fa fa-pen"></i></a>
                                    <a href="/tasks/{{ $task->id }}" style="margin-right: 1rem" class="btn-link is-pulled-right has-text-grey-light"><i class="fa fa-eye"></i></a>
                                @else 
                                    <form action="/trashed-tasks/{{ $task->id }}" method="POST" class="is-pulled-right">
                                        @csrf 
                                        @method('PATCH')
                                        <button class="btn-link">Restore</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach 
                    </ul>
                </div>
            @else 
                <div class="no-results-container">
                    <p class="has-text-grey"><em>No Tasks to show</em></p>
                </div>
            @endif
        </div>
    </div>
@endsection