<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{

    public function create()
    {
        return inertia('UserAccount/create');
    }


    public function store(Request $request)
    {
        $user = User::create(
                    $request->validate([
                        'firstname' => 'required|string|max:255',
                        'lastname' => 'required|string|max:255',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|min:8|confirmed',
                    ])
            );


        Auth::login($user);

        return redirect()->route('listing.index')->with('success', 'Account created successfully.');
    }


}
