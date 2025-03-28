<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (request()->session()->exists('auth')) {
            return redirect(route('tasks.index'));
        } else {
            return view('login');
        }
    }

    public function postLogin(LoginPostAuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->makeVisible(['password']);
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('auth', $user);
                return redirect()->route('tasks.index');
            }
        }

        return redirect()->back()->withErrors(['session_error' => 'Girilen e-posta veya şifre hatalı.'])->withInput();
    }

    public function logout(){
        session()->forget('auth');
        return redirect()->route('login');
    }
}
