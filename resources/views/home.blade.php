@extends('layouts.layout')

@section('content')
    <div class="has-background-grey-lighter is-page-container">
        <div class="container inner-space">
            <div class="accordion">
                <header class="accordion-header has-background-grey-dark">
                    <h2 class="has-text-warning">Upcoming Appointments</h2>
                </header>
                @if ($apps->count() > 0)
                    @foreach ($apps as $app)
                        <div class="accordion-item">
                            <div class="accordion-item-header has-background-grey-dark">
                                <div class="accordion-title has-text-white-bis">
                                    With {{ $app->with }} at {{ $app->where }} on {{ substr($app->on, 0, 10) }} at {{ substr($app->on, 11, 5) }}
                                    @if ($app->remark)
                                        <span class="accordion-collapse is-pulled-right has-background-grey-dark">+</span>
                                    @endif
                                    <form action="/appointments/{{ $app->id }}" method="POST" class="is-pulled-right mr-1">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn-link has-text-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <a href="/appointments/{{ $app->id }}/edit" class="is-pulled-right mr-1"><i class="fa fa-pen"></i></a>
                                </div>
                            </div>
                            @if ($app->remark)                       
                                <div class="accordion-item-content has-background-white-bis">
                                    {{ $app->remark }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else 
                    <div class="accordion-item text-center accordion-item-header has-background-grey-dark">
                        <small class="has-text-white-bis"><em>You have no upcoming appointments yet</em></small>
                    </div>
                @endif
                <div class="accordion-bottom has-background-grey-dark">
                            
                </div>
            </div>
        </div>

        <div class="inner-space">
            <header>
                <h2 class="has-text-black" style="font-size: 1.5rem">Pending Tasks</h2>
            </header>
            <ul class="list is-hoverable mt-1">
                @if ($tasks->count() > 0)
                    @foreach ($tasks as $task)
                        <li href="/tasks/{{ $task->id }}" class="list-item has-background-grey-dark">
                            {{ $task->title }}
                            <form action="/tasks{{ $task->id }}" method="POST" class="is-pulled-right">
                                @csrf 
                                @method('DELETE')
                                <button class="btn-link has-text-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            <a href="/tasks/{{ $task->id }}/edit" style="margin-right: 1rem" class="is-pulled-right"><i class="fa fa-pen"></i></a>
                            <a href="/tasks/{{ $task->id }}" style="margin-right: 1rem" class="btn-link is-pulled-right has-text-grey-light"><i class="fa fa-eye"></i></a>
                        </li>
                    @endforeach
                @else 
                    <li class="list-item has-background-grey-dark has-text-white-ter text-center">
                        <small><em>There are no pending tasks</em></small>
                    </li> 
                @endif
            </ul>
        </div>

        <div class="inner-space">
            <header>
                <h2 class="has-text-black" style="font-size: 1.5rem">Recent Notes</h2>
            </header>
            <ul class="list is-hoverable mt-1">
                @foreach ($notes as $note)
                    <li href="/notes/{{ $note->id }}" class="list-item has-background-grey-dark has-text-white-ter">
                        {{ $note->content }}
                        <form action="/notes/{{ $note->id }}" method="POST" class="is-pulled-right">
                            @csrf 
                            @method('DELETE')
                            <button class="btn-link has-text-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        <a href="/notes/{{ $note->id }}/edit" class="is-pulled-right mr-1"><i class="fa fa-pen"></i></a>
                        <a href="/notes/{{ $note->id }}" class="btn-link is-pulled-right has-text-grey-light mr-1"><i class="fa fa-eye"></i></a>
                    </li>
                @endforeach 
            </ul>
        </div>
    </div>
@endsection
