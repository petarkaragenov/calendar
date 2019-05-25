@extends('layouts.app')

@section('content')
    <div class="has-background-grey-darker">
        <div class="container is-fullheight is-flex">
            <div class="welcome-content">
                <h1 class="title title--huge has-text-warning">Menage your errands with ease</h1> 
                <p class="has-text-white-bis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, non impedit quia eligendi illo dolores, pariatur cumque, vitae fuga animi nam distinctio earum exercitationem? Et sed tempore laudantium aut perspiciatis.</p>
                <div class="buttons are-large mt-2">
                    <div class="tile tile-ancestor">
                        <div class="tile is-6">
                            <a href="{{ route('register') }}" class="button is-light is-fullwidth mr-1">Register</a>
                        </div>
                        <div class="tile is-6">
                            <a href="{{ route('login') }}" class="button is-warning is-fullwidth ml-1">{{ __('Login') }}</a> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
