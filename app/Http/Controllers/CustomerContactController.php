<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerContact;
use Yajra\DataTables\Facades\DataTables;

class CustomerContactController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = CustomerContact::select('id', 'name', 'phone')->where("customer_id", $id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->toJson();
        }

        $createRoute = route('customerContact.create');
        return view('customerContact.index', compact('createRoute'));
    }

    public function create()
    {
        return view('customer.createCustomerContact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        CustomerContact::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ]);

        $indexRoute = route('customerContact.index');
        return redirect()->route('customerContact.index')->with('success', 'Customer contact created successfully.');
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

    public function destroy($id)
    {
        try {
            $customerContact = CustomerContact::findOrFail($id);
            $customerContact->delete();
            return response()->json(['message' => 'customer contact berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus customer contact.']);
        }
    }

    public function getCustomerContacts($customer_id)
    {
        $customerContacts = CustomerContact::where('customer_id', $customer_id)->get();
        return response()->json($customerContacts);
    }
}
