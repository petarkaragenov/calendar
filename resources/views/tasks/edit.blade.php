@extends('layouts.layout')

@section('content')
    <div class="is-page-container has-background-grey-lighter">
        <div class="container inner-space">
            <h1 class="title">Edit Task</h1>
            <div class="box has-background-grey-dark">
                <form action="/tasks/{{ $task->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="field">
                        <label class="label has-text-grey-light" for="">Title</label>
                        <input class="input has-background-grey-lighter {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" id="title" value="{{ $task->title }}">
                        @error('title') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-light" for="">Description</label>
                        <textarea class="textarea has-background-grey-lighter {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" id="description">{{ $task->description }}</textarea>
                        @error('description') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-light" for="">Due Date</label>
                        <input class="input has-background-grey-lighter datepicker {{ $errors->has('due_date') ? 'is-danger' : '' }}" type="text" name="due_date" id="due_date" data-position="right top" value="{{ $task->due_date }}">
                        @error('due_date') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <a href="/tasks" class="button is-secondary">Go Back</a>
                        <button class="button is-warning is-pulled-right">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.datepicker')
@endsection