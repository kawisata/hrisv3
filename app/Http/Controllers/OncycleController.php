<?php

namespace App\Http\Controllers;

use App\Models\Oncycle;
use App\Http\Requests\StoreOncycleRequest;
use App\Http\Requests\UpdateOncycleRequest;

class OncycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOncycleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOncycleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function show(Oncycle $oncycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Oncycle $oncycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOncycleRequest  $request
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOncycleRequest $request, Oncycle $oncycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oncycle $oncycle)
    {
        //
    }
}
