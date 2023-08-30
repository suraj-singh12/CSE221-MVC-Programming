<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
// |
// */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/header', function() {
    return view('header');
});

Route::get('/', function() {                // overrides the previous same route (like css)
    return view('about');
});

// Route::get('/user/{id}', function($id) {        // route with parameter
//     return 'User ' .$id;
// });

// with optional parameter
// Route::get('/user/{id}/{name?}', function($id, $name = null) {        // route with optional parameter
//     return 'User ' .$id. ' with name ' .$name;
// });

Route::get('/user/{id}/{name?}', function($id, $name=null) {
    if($name) {
        return '<h1>userName: ' .$name. ', userID: ' .$id. '</h1>';
    } else {
        return '<h1>userID: ' .$id. '</h1>';
    }
});



// shortcut method
Route::view('/vw', 'welcome');


// using constraint
Route::get('/strictUser/{id}', function($num) {
    return 'User ' .$num;
}) -> whereNumber('id');    // will route only if id is a number
// other avaialble are: whereAlpha(), whereAlphaNumeric(), whereNumber(), whereUuid(), whereRegex()


Route::get('/strictUser/{id}', function($data) {
    return 'User ' .$data;
}) -> whereIn('id',['Alpha', 'Bravo', 'Charlie', 'Delta', 'Echo', 'Foxtrot', 'Golf', 'Hotel', 'India', 'Juliett',
                        'Kilo', 'Lima', 'Mike', 'November',
                        'Oscar', 'Papa', 'Quebec', 'Romeo', 'Sierra', 'Tango', 'Uniform', 'Victor', 'Whiskey', 'X-ray', 'Yankee', 'Zulu']
);


Route::get('/strictUser/{id}', function($data) {
    return 'User ' .$data;
}) -> where('id', '[0-5]+');
// '^[0-5]+[a-z]*[5-9]$'

Route::get('/strictUser/{id}/{about}', function($data, $about) {
    return 'User ' .$data .' and About: ' .$about;
}) -> where('id', '[0-9]+') -> whereAlpha('about');



// define id to be numeric globally for each and every route
// Route::pattern('id', '[0-9]+');          // do this in RouteServiceProvider.php
Route::get('/strictUser/{id}', function($data) {
    return 'strictUser ' .$data;
});
Route::get('/anotherRoute/{id}', function($data) {
    return 'anotherRoute ' .$data;
});


// passing data (array) to view
Route::get('/greet/{name}', function($name) {
    return view('greeting', ['name' => '`Bond, James Bond`']);
});


// nice one : passing data to view (after taking from url)
Route::get('/greet/{name}', function($name) {
    // return view('greeting', ['name' => '`Bond, James Bond`']);
    return view('greeting', ['name' => $name]);
});

Route::get('/admin/{data}', function($data) {
    // return view('admin.profile', ['data' => $data]);
    return view('admin.profile', compact('data'));
    // return view('admin.profile', $data);
});

// passing data to view (single data (non-array))
Route::get('/test', function() {
    $name="Suraj";
    $city="Jalandhar";
    return view('test')->withName($name)->withCity($city);
});

// withKeyname(name), withCollege($college) and many : all custom methods


// ----------------------------
// RESPONSES
// ----------------------------
