<?php

namespace App\Http\Controllers;

use App\Models\RegProvince;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province = RegProvince::get();
        $province->toJson();
        $provinces = RegProvince::with('regency')->get();
        // $provinces->toJson();

        // dd($provinces);
        // return view('livewire.user.index-document-pph', compact(['employee','useraddress','userfamilies']));

        return view('layouts.applistbox', compact(['province', 'provinces']));
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
     * @param  \App\Models\RegProvince  $regProvince
     * @return \Illuminate\Http\Response
     */
    public function show(RegProvince $regProvince)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegProvince  $regProvince
     * @return \Illuminate\Http\Response
     */
    public function edit(RegProvince $regProvince)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegProvince  $regProvince
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegProvince $regProvince)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegProvince  $regProvince
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegProvince $regProvince)
    {
        //
    }
}
