<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index')->with('apps', auth()->user()->appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Appointment $appointment)
    {
        return view('appointments.create');
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
            'with' => 'required|min:3',
            'where' => 'required|min:3',
            'on' => 'required|date'
        ]);

        $attributes['remark'] = $request['remark'];
        $attributes['user_id'] = auth()->id();

        Appointment::create($attributes);

        $request->session()->flash('success', 'Appointment created successfully');

        return redirect('/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        return view('appointments.show')
            ->with('date', $date)
            ->with('apps', Appointment::where('on', 'like', $date.'%')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $this->authorize('update', $appointment);
        return view('appointments.edit')->with('app', $appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        $attributes = $request->validate([
            'with' => 'required|min:3',
            'where' => 'required|min:3',
            'on' => 'required|date'
        ]);

        $attributes['remark'] = $request['remark'];

        $appointment->update($attributes);

        $request->session()->flash('success', 'Appointment updated successfully');

        return redirect('/appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);
        
        $appointment->delete();

        $request->session()->flash('success', 'Appointment deleted successfully');

        return redirect('/appointments');
    }
}
