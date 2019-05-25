<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TrashedTasksController extends Controller
{
    public function index() {
        return view('tasks.index')->with('tasks', auth()->user()->tasks()->onlyTrashed()->get());
    }

    public function restore(Request $request, $id) {
        Task::onlyTrashed()->find($id)->restore();

        $request->session()->flash('success', 'Task restored successfully');

        return redirect('/tasks');
    }

    public function destroy(Request $request, $id) {
        Task::onlyTrashed()->find($id)->forceDelete();

        $request->session()->flash('success', 'Task deleted successfully');

        return redirect('/tasks');
    }
}
