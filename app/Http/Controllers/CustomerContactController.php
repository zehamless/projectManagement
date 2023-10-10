<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerContact;

class CustomerContactController extends Controller
{
    public function index()
    {
        $customerContacts = CustomerContact::all();
        return view('customerContact.index', compact('customerContact'));
    }

    public function create()
    {
        return view('customer.createCustomerContact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);

        CustomerContact::create($request->all());

        return redirect()->route('customerContact.index')
            ->with('success', 'Customer contact created successfully.');
    }

    public function show(CustomerContact $customerContact)
    {
        return view('customerContact.show', compact('customerContact'));
    }

    public function edit(CustomerContact $customerContact)
    {
        return view('customerContact.edit', compact('customerContact'));
    }

    public function update(Request $request, CustomerContact $customerContact)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);

        $customerContact->update($request->all());

        return redirect()->route('customerContact.index')
            ->with('success', 'Customer contact updated successfully.');
    }

    // public function destroy(CustomerContact $customerContact)
    // {
    //     $customerContact->destroy();

    //     return redirect()->route('customerContact.index')
    //         ->with('success', 'Customer contact deleted successfully.');
    // }

    public function getCustomerContacts($customer_id)
    {
        $customerContact = CustomerContact::where('customer_id', $customer_id)->get();

        if (!$customerContact) {
            return response()->json(['error' => 'customerContact not found'], 404);
        }

        // Mengembalikan data customerContact sebagai respons JSON
        return response()->json($customerContact);
    }
}
