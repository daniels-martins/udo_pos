<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FirmController extends Controller
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
        return view('admin.firm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataInput = $request->validate([
            'name' => 'required | unique:firms',
            'logo' => 'sometimes',
            'email' => 'sometimes',
            'head_office' => 'required', //we could have two bizes in the same plaza, so this should not be unique
            'phone' => 'required | unique:firms'
        ]);

        $newCoy = Auth::user()->firm()->create($dataInput);

        /*
        |--------------------------------------------------------------------------
        | Method 1: The same controller different methods
        |--------------------------------------------------------------------------
        |   in this case u use the Session::now() instead of Session::flash()
        */

        if ($newCoy->id) {
            Session::now('success', "New Company ($newCoy->name) Created Successfully");
            return $this->show($newCoy);
        }

        /*
        |--------------------------------------------------------------------------
        | Method 2: different controllers, different methods(or routes)
        |--------------------------------------------------------------------------
        |   this is useful and better than making http calls via axios
        */

        // return ($newCoy->id) ?
        //     redirect()->route('firms.show', ['firm' => $newCoy->id])
        //     ->with('success', "New Company ($newCoy->name) Created Successfully")
        //     : back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        $company = $firm;
        return view('admin.firm.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        $company = $firm;
        return view('admin.firm.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        $company = $firm;
        $dataInput = $request->validate([
            'name' => 'required ',
            'logo' => 'sometimes',
            'email' => 'sometimes',
            'head_office' => 'required', //we could have two bizes in the same plaza, so this should not be unique
            'phone' => 'required'

        ]);

        $stat = $company->update($dataInput);

        return $stat ? back()->with('success', 'Update successful')
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firm  $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        //
    }
}
