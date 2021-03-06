<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\StoreWarehouse;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'all emplyees for a this particular auth::user ';
        $employees = Employee::whereHas('storeWarehouse', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        // dd($newEmployee = Auth::user()->employees);
        $newEmployeeData = $request->all();
        $validated = $request->validate([
            'username' => 'required | unique:customers',
        ]);
        // dd($newEmployeeData);

        // if the user(boss) selected a store, use it else, use the default store which is the first store in the db
        $newEmployeeData['store_warehouse_id'] = $newEmployeeData['store_warehouse_id'] ?? Auth::user()->stores->first()->id;
        // the only reason why this code below works is cos, I am sending the foreign_key of storeWarehouse in the create object itself, so this way its easier to link it. No eloquent just normal vanilla DB relationship.
        $newEmployee= Auth::user()->employees()->create($newEmployeeData);

        return ($newEmployee) ? back()->with('success', "New Employee ($newEmployee->username) Created Successfully")
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $stores = StoreWarehouse::all();
        return view('employees.edit', compact('employee', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // validation will be done later
        $upDatedEmployee = $employee->update($request->all());

        return $upDatedEmployee  ? back()->with('success', 'Employee Update successful')
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee_name =  $employee->username;
        $deleted  = $employee->delete();
        return ($deleted) ? back()->with('success', "{html_entities($employee_name)} deleted ")
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again'); 
        //
    }
}
