<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowRegisterForm() {
        return view('auth.register');
    }

    public function Register(Request $request)
    {
        try
        {
            $request ->validate([
                'name'=> 'required|string|max:255',
                'email'=>'required|string|max:255|unique:users',
                'password'=>'required|string|min:8',
            ]);
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success','register successful');
        }
        catch(\Exception $error)
        {
            dump($error->getMessage());
        }
    }

    public function ShowLoginForm(){
        return view('auth.login');
    }

    public function Login(Request $request){
        try{
            $request ->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();

                return redirect(route('welcome'))->with('success', 'Login successful');
            }
            else {
                return back()->with('error', 'Credentials not found');
            }
        }catch(\Exception $error)
        {
            dump($error->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
