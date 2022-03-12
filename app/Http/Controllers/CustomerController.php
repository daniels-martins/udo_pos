<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\StoreWarehouse;

use function PHPUnit\Framework\returnSelf;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view all customers
        $clients = Customer::all();
      return view('customers.index', compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = StoreWarehouse::all();
        return view('customers.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCustomerData = $request->all();
        // return dd($request->all());
        $validated = $request->validate([
            'username' => 'required | unique:customers'
        ]);
        $newcustomer = Customer::create($newCustomerData);
        return ($newcustomer) ? back()->with('success', "New Category ($newCustomer->username) Created Successfully")
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'customer show';
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // return 'customer edit';
        $stores = StoreWarehouse::all();
        return view('customers.edit', compact('customer', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // validation will be done later
        $dataInput = $request->all(); //very important for subverting the validation
        $stat = $customer->update($dataInput);
        return $stat ? back()->with('success', 'Update successful')
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // return 'customer destroy';
        $customer_name =  $customer->username;
        $deleted  = $customer->delete();
        return ($deleted) ? back()->with('success', "$customer_name deleted")
        :   back()->with('warning', 'Oops! Something went wrong. Please Try again'); 
    }
}
