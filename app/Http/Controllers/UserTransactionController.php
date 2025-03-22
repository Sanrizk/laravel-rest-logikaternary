<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserTransactionRequest;
use App\Http\Requests\UpdateUserTransactionRequest;
use App\Models\UserTransaction;

class UserTransactionController extends Controller
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
    public function store(StoreUserTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTransactionRequest $request, UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTransaction $userTransaction)
    {
        //
    }
}
