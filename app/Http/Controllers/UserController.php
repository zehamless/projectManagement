<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $users = User::all();
        return view('users.index');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function createForm()
    {
        return view('users.createForm');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'division' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $filepath = null;
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $filepath = $file->store('public/signatures');
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'division' => $request->division,
            'signature' => $filepath,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function updateForm(User $user)
    {
        return view('users.updateForm', compact('user'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'first_name' => ['string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'division' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
        ]);

        if ($request->hasFile('signature')) {
            \Storage::delete($user->signature);
            $file = $request->file('signature');
            $filepath = $file->store('public/signatures');
        }

        $user->update([
            'first_name' => $request->first_name ?? $user->first_name,
            'last_name' => $request->last_name ?? $user->last_name,
            'email' => $request->email ?? $user->email,
            'division' => $request->division ?? $user->division,
            'signature' => $filepath ?? $user->signature,
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function delete(User $user): RedirectResponse
    {
        if ($user->signature){
            \Storage::delete($user->signature);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
