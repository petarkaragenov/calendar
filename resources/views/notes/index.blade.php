@extends('layouts.layout')

@section('content')
    <div class="container flex-column">
        @if ($notes->count() > 0) 
            <div class="inner-space grid" style="flex-grow: 1">
                @foreach ($notes as $note)
                    <div class="sticky-note">
                        <div class="is-pulled-left" style="margin: 3rem 0 0 1rem">
                            @if (!$note->trashed())
                                <a href="/notes/{{ $note->id }}/edit">Modify</a>
                            @else
                                <form action="/trashed-notes/{{ $note->id }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-link has-text-danger">Delete</button>
                                </form>
                            @endif
                            
                        </div>
                        <form action="/{{ $note->trashed() ? 'trashed-notes' : 'notes' }}/{{ $note->id }}" method="POST" class="is-pulled-right" style="margin: 3rem 1rem 0 0">
                            @csrf 
                            @if (!$note->trashed())
                                @method('DELETE')
                                <button class="btn-link">Unpin</button>
                            @else 
                                @method('PATCH')
                                <button class="btn-link">Restore</button>
                            @endif
                        </form>
                        <div class="sticky-note-content">
                            {{ $note->content }}
                        </div>
                    </div>
                @endforeach 

            </div>
        @else 
            <div class="no-results-container grid">
            </div>
        @endif
    </div>
@endsection