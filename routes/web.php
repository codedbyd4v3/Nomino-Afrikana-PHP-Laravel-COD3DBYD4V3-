<?php

use Illuminate\Support\Facades\Route;

// welcome.blade.php route
Route::get('/', function () {
    return view('welcome');
});

// about.blade.php route
Route::get('/about', function () { return view('about'); });

// music.blade.php route
Route::get('/music', function () { return view('music'); });

// events.blade.php route
Route::get('/events', function () { return view('events'); });

// contact.blade.php route
Route::get('/contact', function () { return view('contact'); });

// login.blade.php route
Route::get('/login', function () { return view('login'); });

// admin.blade.php route
Route::get('/admin', function () {
    return view('admin'); 
})->middleware('web');
