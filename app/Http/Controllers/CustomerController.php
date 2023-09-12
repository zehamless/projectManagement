<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar data
    public function index()
    {
        // Mengambil data customer_id dan company dari tabel customer_companies dan companies
        $customer = Customer::select('customer.customer_id', 'companies.company')
            ->join('companies', 'customer.company_id', '=', 'companies.id')
            ->get();

        return view('customer.index', compact('customer'));
    }

    // Menampilkan formulir untuk membuat data baru
    public function create()
    {
        return view('customer.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input data
    $request->validate([
        'customer_id' => 'required',
        'company' => 'required',
    ]);

    // Membuat dan menyimpan data baru
    $customer = new Customer();
    $customer->customer_id = $request->input('customer_id');
    $customer->company = $request->input('company');
    $customer->save();

    return redirect()->route('customer.index')
        ->with('success', 'Data customer berhasil ditambahkan.');
}

    // Menampilkan detail data
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    // Menampilkan formulir untuk mengedit data
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    // Memperbarui data dalam database
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_id' => 'required',
            'company' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus data dari database
    public function destroy(Customer $customerCompany)
    {
        $customerCompany->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Data customer berhasil dihapus.');
    }
}
