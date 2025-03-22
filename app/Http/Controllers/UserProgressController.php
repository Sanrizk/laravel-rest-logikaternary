<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProgressRequest;
use App\Http\Requests\UpdateUserProgressRequest;
use App\Models\UserProgress;

class UserProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserProgressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProgress $userProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProgress $userProgress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProgressRequest $request, UserProgress $userProgress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProgress $userProgress)
    {
        //
    }
}
