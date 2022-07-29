<?php

namespace App\Http\Controllers;

use App\Models\UserFamily;
use Illuminate\Http\Request;

class UserFamilyController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFamily  $userFamily
     * @return \Illuminate\Http\Response
     */
    public function show(UserFamily $userFamily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserFamily  $userFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFamily $userFamily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserFamily  $userFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFamily $userFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFamily  $userFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        UserFamily::find($id)->delete();
        return redirect()->route('dashboard')
            ->with('success', 'User Berhasil Dihapus');
    }
}
