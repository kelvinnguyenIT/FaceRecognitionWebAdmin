<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function verifyUser(LoginRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => '1'])){
            return redirect('dashboard')->with("Login Admin Success");
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => '2'])){
            session([
                'name' => Auth::user()->info_account()->first()->name,
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
            ]);
            return redirect('/')->with("Login Success");
        }
        else{
            return redirect('login')->withErrors("Email or Password wrong");
        }
    }
}
