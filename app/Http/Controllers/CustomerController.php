<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar data
    public function index(Request $request)
    {
        // Mulai dengan query untuk model Customer
        $query = Customer::query()->orderBy('created_at', 'desc');

        // Mengecek apakah ada kata kunci pencarian
        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('companyName', 'like', "%$search%");
            });
        }

        // Ambil hasil query
        $customer = $query->get();

        return view('customer.index', compact('customer'));
    }

    // Menampilkan formulir untuk membuat data baru
    public function create()
    {
        return view('customer.createCustomer');
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
            'company' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus data dari database
    public function destroy($id)
    {
        // Temukan pelanggan berdasarkan ID
        $customer = Customer::findOrFail($id);

        // Hapus pelanggan
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
