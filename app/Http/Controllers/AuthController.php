<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   

    public function Registrasi()
    {
        return view('registrasi.index');
    }
    public function submitRegistrasi(Request $request)
    {
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =bcrypt($request->password);
       $user->save();   
       return redirect()->route('login')->with('sukses', 'Registration successful as owner. Please log in.');;
    }

    public function Login()
    {
        return view('login.index');
    }

    public function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            
            $user = Auth::user(); // Dapatkan user yang sedang login

            // Periksa role dan arahkan
            if ($user->level === 'admin') {
                return redirect()->route('Admin.index');
            } elseif ($user->level === 'owner') {
                return redirect()->route('Owner.index');
            } elseif ($user->level === 'kurir') {
                return redirect()->route('Courier.index');
            } else {
                return redirect()->route('login')->with('gagal', 'Unauthorized access.');
            }
        } else {
            return redirect()->back()->with('gagal', 'Email or Password is incorrect.');
        }
    }

       
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


   
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.index', compact('user'));
    }

    
}