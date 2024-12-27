<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\MakeLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request)
    {
       if($request->attempt()) {
            return to_route('dashboard');
       }

        return back()->with(['message' => 'não encontrado']);

    }
}
