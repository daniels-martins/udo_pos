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
        $scales = Auth::user()->qtyScales;
        return view('admin.measurement_scales.index', compact('scales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.measurement_scales.create');
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
        $scale = Auth::user()->qtyScales()->create(['name' => $request->name]);
        $scale1 = Auth::user()->lowQtyScales()->create(['name' => $request->name]);
        $scale2 = Auth::user()->criticalQtyScales()->create(['name' => $request->name]);
        return back()->with('success', 'Product Scale Created successfully');

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
    public function edit(MeasurementScale $scale)
    {
        //
        return view('admin.measurement_scales.edit', compact('scale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeasurementScale $scale)
    {
        $dataInput = $request->validate([
            'name' => 'required'
        ]);
        $stat = $scale->update($dataInput);
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
    public function destroy(MeasurementScale $scale)
    {
        // dd($scale);
        // return 'categoy destroy';
        $scaleName = $scale->name;
        $deleted  = $scale->delete();//returns true
        return ($deleted)
            ? back()->with('success', "$scaleName deleted Successfully")
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }
}
