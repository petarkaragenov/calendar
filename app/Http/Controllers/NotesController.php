<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notes.index')->with('notes', auth()->user()->notes()->orderBy('created_at')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {   
        $attributes = $request->validate([
            'content' => 'required|min:3|max:255'
        ]);

        $attributes['user_id'] = auth()->id();

        Note::create($attributes);

        $request->session()->flash('success', 'Note created successfully');

        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);
        $attributes = $request->validate([
            'content' => 'required|min:3|max:255'
        ]);

        $note->update($attributes);

        $request->session()->flash('success', 'Note updated successfully');

        return redirect('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Note $note)
    {
        $this->authorize('update', $note);
        $note->delete();

        $request->session()->flash('success', 'Note unpinned successfully');

        return redirect('/notes');
    }
}
