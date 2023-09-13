<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 
    function show(){
        echo "Hello from UserController";
    }

    function hello() {
        echo "hello from  hello() in UserController";
    }
    // attaching middleware to controller (userController)
    function __Construct() {
        $this->middleware('UserMiddleware');
    }
    
    function dashboard() {
        return "dashboard from UserController";
    }
    function users() {
        return "users from UserController";
    }
    function settings() {
        return "settings from UserController";
    }
}
