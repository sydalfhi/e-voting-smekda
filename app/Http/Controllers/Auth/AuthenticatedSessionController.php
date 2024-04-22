<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();
        $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('plain_password', $request->password)->first();

        if (!$user) {
            return backToLoginWithMessage('Nama Atau NIS Kamu Salah');
        } else {
            if ($request->password != $user->plain_password ||  strtolower($request->name) != strtolower($user->name)) {
                return  backToLoginWithMessage('Nama Atau NIS Kamu Salah');
            }
            if ($user->role != 'admin') {
                if ($user->status == 'Y') {
                    return backToLoginWithMessage('Kamu Telah Melakukan Voting Sebelumnya ( Hubungi Panitia Jika Terjadi Kesalahan )');
                }
            }
        }

        Auth::login($user);

        $request->session()->regenerate();

        if ($user->role == 'admin') {
            return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME_USER);
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

function backToLoginWithMessage($param)
{
    return back()->withErrors([
        'password' => $param,
    ]);
}
