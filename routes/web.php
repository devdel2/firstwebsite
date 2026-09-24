<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SpotifyController;

Route::get('/', function() {
    return view('home');
})->name("home");

// Admin routes
Route::prefix("admin")->group(function() {
    // Routes for user admin
    Route::get('/users', function() { 
        return view('./admin-test/users');
    })->name('users');
    // Route for submitted a created user
    Route::post('/usercreated', function(Request $request) {
        //validate the inputs first
        $request->validate([
            'username' => 'required|min:3|max:24',
            'password' => 'required|min:8|max:24'
        ]);
        //set the variables after "validation"
        $userData = [$username = $request->input("username"),
        $password = $request->input("password")];
        // return the data for test
        return view('./admin-test/user-created', $userData);
    })->name('usercreated');
});

// Bands Index and Route grouping
Route::prefix("bands")->group(function() {
    // Route for bands index
    Route::get('/', function() {
        return view('./music/bands');
    })->name("bands");
    // Route for Daisyhead
    Route::get('/daisyhead', function() {
        return view('./music/daisyhead');
    })->name("daisyhead");
    // Route for tradition
    Route::get('/tradition', function() {
        return view('./music/tradition');
    })->name("tradition");
    // Route for Runoff
    Route::get('/runoff', function() {
        return view('./music/runoff');
    })->name('runoff');
});

// Band Resource Routes


// Education Route
Route::get('/education', function() {
    return view('education');
})->name('education');

// Career Route
Route::get('/career', function() {
    return view('career');
})->name('career');

// Spotify Routes
Route::get('/spotify/search', [SpotifyController::class, 'search']);