<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::resource('students', StudentController::class);

Route::get('/', function () {
    return redirect()->route('students.index');
});



Route::get('/c', function () {
    return view('students.create');
});
