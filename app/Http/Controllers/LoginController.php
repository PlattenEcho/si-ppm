<?php

namespace App\Http\Controllers;

use App\Mail\SendVerificationCodeEmail;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
            return back()->with('error', 'Login dengan login calon peserta magang!');
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

        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode = substr(str_shuffle(str_repeat($pool, 5)), 0, 5);


        if ($validatedData['password'] == $validatedData['confirmPassword']) {
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'idrole' => 3,
                'kode_verifikasi' => $kode
            ]);
            Mail::to($validatedData['email'])->send(new SendVerificationCodeEmail($validatedData['name'], $kode));

            $request->session()->flash('success', 'Registrasi berhasil! Silahkan Login');
            return redirect('/login');
        } else {
            $request->session()->flash('passwordFail', 'Password dan Konfirmasi Password tidak sama');
            return redirect('/register');
        }


    }

    public function viewEmailVerification()
    {
        $user = Auth::user();
        if ($user && $user->email_verified_at) {
            return redirect('/');
        } 
        else {
            if ($user && !$user->email_verified_at){
                $email = $user->email;
                return view('email_verification', compact('email'));
            }
            else{
                return view('login')-> with('error', 'Silahkan login terlebih dahulu!');
            }
        }
    }

    public function verificate(Request $request){
        $validatedData = $request->validate([
            'kode_verifikasi' => 'required|max:5',
        ]);
        $user = Auth::user();

        if ($user->kode_verifikasi == $validatedData['kode_verifikasi']){
            $user->email_verified_at = now();
            $user->save();
            return redirect('/')->with('success', 'Verifikasi akun berhasil!');
        }else{
            return back()->with('verifError', 'Kode salah, cek kembali kode yang diketikkan!');
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
