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
        $path = request()->path();
        return view('customer.create', compact('path'));
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'companyName' => 'required|string|max:255',
        ]);

        // Membuat dan menyimpan data baru
        //$customer = new Customer();
       // $customer->companyName = $request->input('companyName');
       // $customer->save();
       try {
        $customer = Customer::create([
            'companyName' => $request->input('companyName'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Data customer berhasil ditambahkan.');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }

       // return redirect()->route('customer.index')
        //    ->with('success', 'Data customer berhasil ditambahkan.');}

    // Menampilkan detail data
    public function show(Customer $customer)
    {
        return view('customer.detailCustomer', compact('customer'));
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
            'companyName' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus data dari database
    public function destroy($id)
    {
    $customer = Customer::findOrFail($id);
    $customer->delete();

    return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
