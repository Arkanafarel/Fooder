<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tampilkanFormMasuk()
    {
        return view('auth.login');
    }

    public function tampilkanFormDaftar()
    {
        return view('auth.register');
    }

    public function prosesDaftar(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:customer,store',
        ]);

        $user = User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        if ($user->role === 'store') {
            Toko::create([
                'user_id'   => $user->id,
                'name'      => 'Toko ' . $user->name,
                'is_active' => true,
            ]);
        }

        Auth::login($user);

        return $this->arahkanBerdasarkanRole($user->role);
    }

    public function prosesMasuk(Request $request)
    {
        $kredensial = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($kredensial, $request->remember)) {
            $request->session()->regenerate();
            return $this->arahkanBerdasarkanRole(Auth::user()->role);
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    public function prosesKeluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    private function arahkanBerdasarkanRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'store':
                return redirect()->route('store.dashboard');
            default:
                return redirect()->route('customer.home');
        }
    }

    public function berandaCustomer()
    {
        return view('customer.home');
    }

    public function dashboardToko()
    {
        return view('store.dashboard');
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }
}