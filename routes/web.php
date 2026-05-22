<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('tasks', function() {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('create', function() {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);

    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('delete/{id}', function($id) {
    DB::table('tasks')->where('id', $id)->delete();

    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('edit/{id}', function($id) {
    $task_name = $_POST['name'];
    DB::table('tasks')->where('id', $id)->update(['name' => $task_name]);

    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});