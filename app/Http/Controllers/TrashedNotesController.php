<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class TrashedNotesController extends Controller
{
    public function index() {
        return view('notes.index')->with('notes', auth()->user()->notes()->onlyTrashed()->get());
    }

    public function restore(Request $request, $id) {
        Note::onlyTrashed()->find($id)->restore();

        $request->session()->flash('success', 'Note restored successfully');

        return redirect('/notes');
    }

    public function destroy(Request $request, $id) {
        Note::onlyTrashed()->find($id)->forceDelete();

        $request->session()->flash('success', 'Note deleted successfully');

        return redirect('/notes');
    }
}
