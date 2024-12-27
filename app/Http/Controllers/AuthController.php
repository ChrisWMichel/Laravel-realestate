<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

//use App\Http\Requests\Auth\LoginRequest;
//use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function create()
    {
        return inertia('Auth/login');
    }

    public function store(LoginRequest $request)
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(route('listing.index'));
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }


    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('listing.index'));
    }
}
