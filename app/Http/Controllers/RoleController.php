<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index');
    }

    public function createForm()
    {
        return view('roles.createForm');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:12|unique:roles',
        ]);
        if (!$data){
            return redirect()->back()->with('error', 'Role gagal ditambahkan');
        }
        $role = Role::create($data);
        return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan');
    }

    public function updateForm()
    {
        return view('roles.updateForm');
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|max:12',
        ]);
        if (!$data){
            return redirect()->back()->with('error', 'Role gagal diupdate');
        }
        $role->update($data);
        return redirect()->route('roles.index')->with('success', 'Role berhasil diupdate');
    }

    public function delete(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus');
    }
}
