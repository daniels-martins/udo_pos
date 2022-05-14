<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StoreWarehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Auth::user()->stores;
        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $valid = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'desc' => 'sometimes'
        ]);
        $newStore = Auth::user()->stores()->create([
            'name' => $valid['name'],
            'address' => $valid['address'],
            'desc' => $valid['desc'],
        ]);
        $newStore->name = ucfirst($newStore->name);
        return $newStore
            ? back()->with('success', "New Store ($newStore->name) Created Successfully")
            : back()->with('warning', 'Oops! Something went wrong. Please Try again');
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
    public function edit(StoreWarehouse $store)
    {
        $countries = Country::all();
        return view('admin.stores.edit', compact('store', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreWarehouse $store)
    {
        // dd($request->all());
        $dataInput = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'desc' => 'sometimes',
            'status' => 'required',
            'country_id' => 'required'
        ]);
        $stat = $store->update($dataInput);
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
    public function destroy(StoreWarehouse $store)
    {
        // return 'customer destroy';
        $store_name =  $store->name;
        $deleted  = $store->delete();
        return ($deleted) 
        ? back()->with('success', "$store_name store deleted")
        : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }
}
