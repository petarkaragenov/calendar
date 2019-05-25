@extends('layouts.layout')

@section('content')
    <div class="is-page-container has-background-grey-lighter">
        <div class="container inner-space">
            <div class="accordion">
                <header class="accordion-header has-background-grey-dark">
                    <h4 class="has-text-warning">Appointments</h4>
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
                        <small class="has-text-white-bis"><em>You have no appointments on this date</em></small>
                    </div>
                @endif
                <div class="accordion-bottom has-background-grey-dark">
                            
                </div>
            </div>
            @if ((new DateTime($date))->diff(new DateTime('1970-01-01'))->format('%a days') >= (new DateTime())->diff(new DateTime('1970-01-01'))->format('%a days'))
                <h1 class="title">Create New Appointment on this Date</h1>
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
                            <input type="text" class="input has-background-grey-lighter datepicker {{ $errors->has('on') ? 'is-danger' : '' }}" name="on" id="on" value="{{ $date }} 00:00:00">
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
            @endif
        </div>
    </div>
@endsection



@section('scripts')
    @include('includes.datepicker')
    <script>
        $('.accordion-collapse').click(function() {
            ($(this).text() === "+") ? $(this).text('-') : $(this).text('+');
            $(this).parent().parent().parent().find('.accordion-item-content').slideToggle();
        })
    </script>
@endsection