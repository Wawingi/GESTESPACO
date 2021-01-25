<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UtilizadorController extends Controller
{

    public function logar(Request $request){
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password],true)) {
            return redirect()->intended('dashboard');
        } else {
            //return response()->json(['error'=>'Erro ao logar'],401);
            return back()->with('error','Erro ao efectuar login. Verifique as credenciais');  
        }
    }

    public function logout(){
        if(Auth::logout()==null)
           return redirect()->intended('/');
        
    }
}
