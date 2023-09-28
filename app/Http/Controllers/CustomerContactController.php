<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerContact;

class CustomerContactController extends Controller
{
    public function index()
    {
        $customerContacts = CustomerContact::all();
        return view('customer_contacts.index', compact('customerContacts'));
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

        return redirect()->route('customer.index')
            ->with('success', 'Customer contact created successfully.');
    }

    public function show(CustomerContact $customerContact)
    {
        return view('customer_contacts.show', compact('customerContact'));
    }

    public function edit(CustomerContact $customerContact)
    {
        return view('customer_contacts.edit', compact('customerContact'));
    }

    public function update(Request $request, CustomerContact $customerContact)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);

        $customerContact->update($request->all());

        return redirect()->route('customer_contacts.index')
            ->with('success', 'Customer contact updated successfully.');
    }

    public function delete(CustomerContact $customerContact)
    {
        $customerContact->delete();

        return redirect()->route('customer_contacts.index')
            ->with('success', 'Customer contact deleted successfully.');
    }

    public function getCustomerContacts($customer_id)
    {
        $customerContacts = CustomerContact::where('customer_id', $customer_id)->get();
        return response()->json($customerContacts);
    }
}
