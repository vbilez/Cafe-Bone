<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class odmin extends Controller
{
	public function login()
    {
        return view('auth.login');
    }
public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function loginfromsite(Request $request)
    {
    if(($request->log=='odmin')&&($request->pwd=='passcode1050'))
    	{	
          return redirect('/auth/login');
        }

          return redirect('/');
    }
    public function login2(Request $request)
    {
    	if(Auth::attempt(['name'=>$request->login,'password'=>$request->pass]))
    	{
        return redirect('/odmin');
        }
        return redirect('/');
    }

  

}
