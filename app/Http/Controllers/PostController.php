<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "hello world from index()";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "hello world from create()";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return "hello world from store()";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "hello world from show()";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "hello world from edit()";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return "hello world from update()";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return "hello world from destroy()";
    }
}
