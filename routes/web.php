<?php

use Illuminate\Support\Facades\Route;
use Prakash\Todolist\Models\Task;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/task-create', function () {
   Task::create(['name' => 'Example 123 Task']);
});
