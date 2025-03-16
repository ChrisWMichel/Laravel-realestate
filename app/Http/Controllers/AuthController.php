<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        //return inertia('Auth/login');
        return inertia()->render('Auth/Login');
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

    public function resendVerification(Request $request)
    {
        
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['error' => 'User not found for this email.']);

        }
        if ($user->hasVerifiedEmail()) {
            return back()->with('success', 'Email already verified. Please Log in.');
        }

        try {
            $user->sendEmailVerificationNotification();
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send verification email.']);
        }
        return back()->with('success', 'Verification link sent!');
    }


    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('listing.index'));
    }
}
