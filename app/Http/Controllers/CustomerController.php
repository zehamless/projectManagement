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
            $data = Customer::select('id', 'companyName');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Definisikan tombol aksi di sini (detail, edit, hapus)
                    $btn = '<a href="#" class="edit btn btn-info btn-sm">Edit</a>';
                    $btn .= '<a href="#" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        $createRoute = route('customer.create');
        return view('customer.index', compact('createRoute'));
    }

    // Menampilkan formulir untuk membuat data baru
    public function create()
    {

        return view('customer.createCustomer');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'companyName' => 'required',
        ]);

        // Simpan data pelanggan ke database
        Customer::create([
            'companyName' => $request->input('companyName'),
        ]);

        $indexRoute = route('customer.index'); // Sesuaikan dengan nama rute index Anda
        return redirect($indexRoute)->with('success', 'Data customer berhasil ditambahkan.');
    }

    // Menampilkan detail data
    public function show($id)
    {
        return view('customer.detailCustomer', compact('customer'));
    }

    // Menampilkan formulir untuk mengedit data
    public function edit($id)
    {
        return view('customer.edit', compact('customer'));
    }

    // Memperbarui data dalam database
    public function update(Request $request, Customer $id)
    {
        $request->validate([
            'companyName' => 'required',
        ]);

        $id->update($request->all());

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
