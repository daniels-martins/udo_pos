<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeasurementScale;
use Illuminate\Support\Facades\Auth;

class MeasurementScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scales = Auth::user()->measurement_scales;
        return view('measurement_scales.index', compact('scales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('measurement_scales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
        ]);
        $newStuff = Auth::user()->measurement_scales()->create(['name' => $request->name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MeasurementScale $measurement_scale)
    {
        //
        return view('measurement_scales.edit', compact('measurement_scale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeasurementScale $measurement_scale)
    {
        $dataInput = $request->validate([
            'name' => 'required'
        ]);
        $stat = $measurement_scale->update($dataInput);
        return $stat
            ? back()->with('success', 'Update successful')
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeasurementScale $measurement_scale)
    {
        // return 'categoy destroy';
        $measurement_scale = $measurement_scale->name;
        $deleted  = $measurement_scale->delete();//returns true
        return ($deleted)
            ? back()->with('success', "$measurement_scale deleted Successfully")
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }
}
