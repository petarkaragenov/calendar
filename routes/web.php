<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {
    Route::resource('tasks', 'TasksController');
    Route::resource('notes', 'NotesController');
    Route::resource('appointments', 'AppointmentsController');

    Route::get('trashed-tasks', 'TrashedTasksController@index');
    Route::patch('trashed-tasks/{task}', 'TrashedTasksController@restore');
    Route::delete('trashed-tasks/{task}', 'TrashedTasksController@destroy');

    Route::get('trashed-notes', 'TrashedNotesController@index');
    Route::patch('trashed-notes/{task}', 'TrashedNotesController@restore');
    Route::delete('trashed-notes/{task}', 'TrashedNotesController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
