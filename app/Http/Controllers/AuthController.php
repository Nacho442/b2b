<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        //dd('Login Ok');
        /*$credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
            ]);*/

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return back()->with('alert', 'Correo y/o password incorrecto!');
        }

        //return redirect()->route('admindash.index');
        /*if(Auth::user()->rol == 'paciente'){
            return redirect()->route('userdash.index');
        }else{
            return redirect()->route('admindash.index');
        }*/

        return redirect()->route('dashboard.index');
        /*return back()
        ->withErrors(['email' => trans('auth.failed')])
        ->withInput(request(['email']));*/
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
