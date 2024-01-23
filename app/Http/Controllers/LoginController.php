<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticateMahasiswa(Request $request)
    {
        $credentials = request()->validate([
            "email" => "required|email:dns",
            "password" => "required|min:8|max:255",
        ]);

        $email = $credentials['email'];

        $user = User::where('email', $email)->first();

        if ($user && $user->idrole === 3) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $user = $request->user();
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            }
        } elseif ($user) {
            return redirect()->intended('/')->with('error', 'Login dengan login admin!');
        }

        return back()->with('error', 'Login Gagal');
    }

    public function authenticateNonMahasiswa(Request $request)
    {
        $credentials = request()->validate([
            "email" => "required|email:dns",
            "password" => "required",
        ]);

        $email = $credentials['email'];

        $user = User::where('email', $email)->first();

        if ($user->idrole != 3) {
            if (Auth::attempt($credentials)) {
                $user = $request->user();

                if ($user->idrole === 1) {
                    $request->session()->regenerate();
                    return redirect()->intended('/admin');
                } else if ($user->idrole === 2) {
                    $request->session()->regenerate();
                    return redirect()->intended('/kepala-diskominfo/dashboard');
                }
            }
        } else {
            toastr()->error('Login dengan login mahasiswa!', 'Login Error!');
        }
        return back()->with('loginFail', 'Login Gagal');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
            "confirmPassword" => 'required|min:8|max:255'
        ]);

        if ($validatedData['password'] == $validatedData['confirmPassword']) {
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'idrole' => 3,
            ]);

            $request->session()->flash('success', 'Registrasi berhasil! Silahkan Login');
            return redirect('/login');
        } else {
            $request->session()->flash('passwordFail', 'Password dan Konfirmasi Password tidak sama');
            return redirect('/register');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout Berhasil, silahkan login kembali');
    }
}
