<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserAccountController extends Controller
{

    public function create()
    {
        return inertia('UserAccount/create');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $user = User::create(
                    $request->validate([
                        'firstname' => 'required|string|max:255',
                        'lastname' => 'required|string|max:255',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|min:8|confirmed',
                    ])
            );

        event(new Registered($user));

        return redirect()->route('verification.notice', ['email' => $user->email])->with('success', 'Account created successfully.');
       // return redirect()->route('listing.index')->with('success', 'Account created successfully.');
    }


}
