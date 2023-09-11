<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index');
    }

    public function createForm()
    {
        return view('roles.createForm');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function updateForm()
    {
        return view('roles.updateForm');
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role): RedirectResponse
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

    /**
     * @param Role $role
     * @return RedirectResponse
     */
    public function delete(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus');
    }
}
