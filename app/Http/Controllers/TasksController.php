<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Note;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index')->with('tasks', auth()->user()->tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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
            'title' => 'required|unique:tasks|min:3|max:255',
            'description' => 'required|min:3',
            'due_date' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        Task::create($attributes);

        $request->session()->flash('success', 'Task created successfully');

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $attributes = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'due_date' => 'required',
        ]);

        $task->update($attributes);

        $request->session()->flash('success', 'Task updated successfully');

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task) 
    {
        $this->authorize('update', $task);
        $task->delete();

        $request->session()->flash('success', 'Task trashed successfully');

        return redirect('/tasks');
    }
}
