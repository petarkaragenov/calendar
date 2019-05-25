@extends('layouts.layout')

@section('content')
    <div class="is-page-container has-background-grey-lighter">
        <div class="container inner-space">
            <h1 class="title">Update Note</h1>
            <div class="box has-background-grey-dark">
                <form action="/notes" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label has-text-grey-light" for="">Content</label>
                        <textarea class="textarea has-background-grey-lighter {{ $errors->has('content') ? 'is-danger' : '' }}" name="content" id="content">{{ $note->content }}</textarea>
                        @error('content') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <a href="/notes" class="button is-secondary">Go Back</a>
                        <button class="button is-warning is-pulled-right">Update Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection