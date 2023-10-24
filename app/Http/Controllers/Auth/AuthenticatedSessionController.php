<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('customLogin');
    }

    /**
     * @return View
     */
    public function roleSelect(): View
    {
        $roles = Auth::user()->hasroles->pluck('name')->toArray();
        return view('rolecustomelogin', compact('roles'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('roleSelect');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function setSession($role)
    {
        if(Auth::user()->hasroles->contains('name', $role))
        {
            Session::put('role', $role);
            if($role == 'Sales Executive'){
                return redirect()->route('sistemPenawaran.dashboardPenawaran');
            }else{
                return redirect()->route('dashboarddashboard.index');
            };
        }else{
            Session::put('role', 'none');
            return redirect()->route('roleSelect');
        }
    }
}
