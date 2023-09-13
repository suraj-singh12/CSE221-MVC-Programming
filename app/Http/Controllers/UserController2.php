<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController2 extends Controller
{
    function showProfile() {
        // return "<h1>show Profile from userController2</h1>";
        $userName = 'Tony Stark';
        $isAdmin = true;
        $items = ['item1', 'item2', 'item3'];
        return view('profile', compact('userName', 'isAdmin', 'items'));
    }
    function showUrl() {
        return view('current-url');
    }
}
