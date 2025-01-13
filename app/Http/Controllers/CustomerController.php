<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $customers = Customer::all(); // Get all customers
    return view('customers.index', compact('customers')); // Pass data to the view
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('customers.create'); // Return the view for creating a customer
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the input data
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'required|string',
        'address' => 'nullable|string',
    ]);

    // Create and save the customer
    Customer::create($request->all());

    // Redirect back to the customers list with a success message
    return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $customer = Customer::findOrFail($id); // Find customer by ID
    return view('customers.show', compact('customer')); // Return the view for showing customer details
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $customer = Customer::findOrFail($id); // Find customer by ID
    return view('customers.edit', compact('customer')); // Return the view for editing customer
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the input data
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email,' . $id,
        'phone' => 'required|string',
        'address' => 'nullable|string',
    ]);

    // Find the customer by ID and update their information
    $customer = Customer::findOrFail($id);
    $customer->update($request->all());

    // Redirect to the customers list with a success message
    return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $customer = Customer::findOrFail($id); // Find the customer by ID
    $customer->delete(); // Delete the customer

    // Redirect to the customers list with a success message
    return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
}

}
