<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;
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



// redirection: ::: :: 
// ------------------------------------------------
Route::get('/home/dashboard', function() {
    return view('welcome');
});
Route::get('/dashboard', function() {
    // redirecting to another route
    return redirect('/home/dashboard');
});

// ------------------------------------------------

// Redirecting to named routes:
Route::get('/myTestUrl', ['as' => 'testing', function() {   // other route can redirect to testing, but user can't put testing in the url
    return view('welcome');
}]);

// redirecting to another route
Route::get('redirect', function() {
    return redirect()->route('testing');        // will redirect to myTestUrl (which has an alias name as 'testing')
});


// ------------------------------------------------

// redirecting to an external url
Route::get('/code', function() {
    return redirect()->away('https://www.github.com/');
});



// Route::get('/action', function() {
//     return redirect()->action('HomeController@index');
// });

// ------------------------------------------------
//  defining a route to the controller

Route::get('/controllerUser', [UserController::class, "show"]);        // here we are referencing to the show() method of UserController class

Route::get('/controllerUser/hello', [UserController::class, "hello"]);        // here we are referencing to the hello() method [custom method] of UserController class   


Route::get('/provision', ProvisionServer::class);

Route::post('/provisionPost', ProvisionServer::class);

// using my custom middleware by nickname 
Route::get('/profile', [UserController::class, "show"])
    ->middleware('userNew');

// using my custom middleware by its name
// Route::get('/tmpProfile', [UserController::class, "show"])
//     ->middleware(UserMiddleware::class);


Route::get('/tmpProfile', [UserController::class, "show"]);

Route::get('/customRoute1', function() {
    return view('welcome');
});

Route::prefix('custom')->middleware('UserMiddleware')->group(function() {
    //routes defined here will have 'custom' prefix and will use 'UserMiddleware' middleware
    
    //  pending !!!!!
});

Route::resource('posts', PostController::class);
/*
this single line of code generates multiple reoutes fr common CRUD operations, including:
GET         /posts (index method):          Displays a list of all posts
GET         /posts/create (create method):  Show the form for creating a new post
POST        /posts (store method):          Store a newly created post in the database
GET         /posts/{id} (show method):      Display the details of a specific post
GET         /posts/{id} (edit method):      Show the form for editing a post
PUT/PATCH   /posts/{id} (update method):    Update a speific post in the database
DELETE      /posts/{id} (destroy method):   Delete a specific post from the databse
*/


