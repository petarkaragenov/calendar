@extends('layouts.layout')

@section('content')
    <div class="is-page-container has-background-grey-lighter">
        <div class="container inner-space">
            <div class="box has-background-grey-dark">
                <h1 class="title has-text-grey-lighter">{{ $task->title }}</h1>
                <small class="has-text-grey-lighter">{{ $task->due_date }}</small>
                <p class="has-text-grey-lighter mt-1">{{ $task->description }}</p>
            </div>
        </div>
    </div>
@endsection