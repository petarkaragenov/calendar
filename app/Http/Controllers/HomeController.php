<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Appointment;
use App\Note;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // add user authorization
        return view('home')
            ->with('apps', Appointment::where('on', '>=', Carbon::now())
                ->where('user_id', '=', auth()->user()->id)
                ->orderBy('on', 'desc')
                ->limit(3)
                ->get())
            ->with('notes', Note::orderBy('created_at', 'desc')
                ->where('user_id', '=', auth()->user()->id)
                ->limit(3)
                ->get())
            ->with('tasks', Task::where('due_date', '>=', Carbon::now())
                ->where('user_id', '=', auth()->user()->id)
                ->orderBy('due_date', 'desc')
                ->limit(3)
                ->get());
    }
}
