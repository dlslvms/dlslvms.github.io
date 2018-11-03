<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{


    public function loginShowForm(){
        return view('page.login');
    }

    public function login(Request $request){

        // dd($request->all());
        $this->validate($request, [
            'user_number' => 'required|max:10',
            'password' => 'required|min:6',
        ]);

        $login = Auth::attempt([
                'user_number' => $request->user_number,
                'password' => $request->password,
                'status' => 0
        ]);
        if(!empty($login))
        {   
            return redirect('dashboard');     
        }
            return back()->with('ErrorEdit','Wrong user number or password, Please Try again');
    }
    // protected function credentials(Request $request)
    // {
    //     return array_merge($request->only($this->user_id(), 'password'),
    //     ['status' => 0]);
    // }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

