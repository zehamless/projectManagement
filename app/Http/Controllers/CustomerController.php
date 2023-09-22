<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar data
    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::query()
            ->where('companyName', 'LIKE', "%{$search}%")
            ->get();
        $customer = Customer::all();
        return view('customers.index', compact('customers'));
    }
    // Menampilkan formulir untuk membuat data baru
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'companyName' => 'required',
        ]);

        // Membuat dan menyimpan data baru
        $customer = new Customer();
        $customer->companyName = $request->input('companyName');
        $customer->save();

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil ditambahkan.');
    }

    // Menampilkan detail data
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Menampilkan formulir untuk mengedit data
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data dalam database
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'company' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus data dari database
    public function delete(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil dihapus.');
    }
}
