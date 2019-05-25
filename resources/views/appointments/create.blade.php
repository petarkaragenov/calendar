@extends('layouts.layout')

@section('content')
    <div class="is-page-container has-background-grey-lighter">
        <div class="container inner-space">
            <h1 class="title">Create Appointment</h1>
            <div id="create" class="box has-background-grey-dark">
                <form action="/appointments" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label has-text-grey-light" for="with">With</label>
                        <input type="text" class="input has-background-grey-lighter {{ $errors->has('with') ? 'is-danger' : '' }}" name="with" id="with">
                        @error('with') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-light" for="where">Where</label>
                        <input type="text" class="input has-background-grey-lighter {{ $errors->has('with') ? 'is-danger' : '' }}" name="where" id="where">
                        @error('where') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-light" for="on">On</label>
                        <input type="text" class="input has-background-grey-lighter datepicker {{ $errors->has('on') ? 'is-danger' : '' }}" name="on" id="on" value="{{ old('on') }}">
                        @error('on') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-light" for="remark">Remark</label>
                        <textarea class="textarea has-background-grey-lighter {{ $errors->has('remark') ? 'is-danger' : '' }}" name="remark" id="remark">{{ old('content') }}</textarea>
                        @error('remark') 
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="field">
                        <a href="/appointments" class="button is-secondary">Go Back</a>
                        <button class="button is-warning is-pulled-right">Create Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.datepicker')
@endsection