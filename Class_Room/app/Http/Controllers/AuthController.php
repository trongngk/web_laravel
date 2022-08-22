<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function Logingin(Request $request){
        try {
            $user = Data::query()
                ->where('username', $request->get('username'))
                ->where('password', $request->get('password'))
                ->firstOrFail();
            // dd($user->id);
            session()->put('id', $user->id);
            session()->put('name', $user->fullname);
            session()->put('level', $user->role);
            return redirect()->route("data.index");
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('warning',"Your credentials do not correct. Try again !!!");
            // return view("a");
        }
        
    }
    public function logout(){
        session()->flush();
        return redirect()->route('login');

    }
}
