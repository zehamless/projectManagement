<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->toJson();
        }

        $createRoute = route('customer.create');
        return view('customer.index', compact('createRoute'));
    }

    public function create()
    {
        return view('customer.createCustomer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required',
        ]);

        Customer::create([
            'companyName' => $request->input('companyName'),
        ]);

        $indexRoute = route('customer.index');
        return redirect($indexRoute)->with('success', 'Data customer berhasil ditambahkan.');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $customerContacts = $customer->contacts;
        $relatedProjects = $customer->projects;

        return view('customer.show', compact('customer', 'customerContacts', 'relatedProjects'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'companyName' => 'required',
        ]);

        $customer = Customer::find($request->input('id'));
        $customer->update([
            'companyName' => $request->input('companyName'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Data customer berhasil diperbarui.');
    }

    public function getCustomerData($id)
    {
        // Cari data milestone berdasarkan ID
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        // Mengembalikan data cu$customer sebagai respons JSON
        return response()->json($customer);
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            return response()->json(['message' => 'customer berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus customer.'], 500);
        }
    }

    public function detail($id)
    {
        $customer = Customer::find($id);
        $customerContacts = $customer->contacts;
        $relatedProjects = $customer->projects;

        return view('customer.detailCustomer', compact('customer', 'customerContacts', 'relatedProjects', 'id'));
    }
}
