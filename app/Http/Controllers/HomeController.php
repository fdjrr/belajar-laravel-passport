<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home.index', [
            'clients' => $request->user()->clients
        ]);
    }


    public function login()
    {
        return view('home.login');
    }

    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where([
            'email' => $email
        ])->first();
        if (!$user) {
            $user = new User();
            $user->email = $email;
            $user->name = 'User';
            $user->password = Hash::make($password);
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }

        if (Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
