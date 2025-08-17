<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
        public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

            public function register(Request $request)
    {

        $request->validate([
            'f_name'=>'required|max:255|min:2',
            'l_name'=>'required|max:255|min:2',
            'username'=>'required|max:255|min:2',

            'email'=> 'required|email|unique:users',

            'address_line_1'=>'max:100|min:5',
            'address_line_2'=>'max:100|min:0',
            'city'=>'max:50|min:2',
            'state'=>'max:50|min:2',
            'postal_code'=>'max:10|min:5',
            'country'=>'max:50|min:2',

            'phone_number' => 'string|min:10|max:20|regex:/^[\d\s\+\-]+$/',

            'password' => ['required', 'confirmed', RulesPassword::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised(),
            
                        ],


        ]);

        $user= User::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'username'=>$request->username,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>$request->password


        
        ]);

        Auth::login($user);
        if($user){
            return redirect()->route('show.menu')->with('success','users is inserted');
        }
    }
    public function login(Request $request)
    {
          $validated= $request->validate([
            
            'email'=> 'required|email',
            'password'=> 'required|string',
           

        ]);

        if( Auth::attempt($validated)){

         $request->session()->regenerate();

         if(Auth::user()->is_admin){
         return redirect()->route('admin.menu');
         }else{
         return redirect()->route('show.menu');
        }

        }

        return back()->withErrors([
        'login' => 'Invalid credentials. Please try again.',
    ])->withInput();


    
    }

    public function logout(Request $request)
    {
         Auth::logout();

         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect()->route('show.menu');

        
    }
}
