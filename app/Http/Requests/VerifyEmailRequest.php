<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Routing\Exceptions\InvalidSignatureException;



class VerifyEmailRequest extends FormRequest
{

    public function authorize()
    {

        $user = User::find($this->route('id')); // Retrieve user here directly

         if (!$user) { //check for null here
             return false;
         }

        if (! hash_equals((string) $user->getKey(), (string) $this->route('id'))) {

            return false;
        }

        if (! hash_equals(sha1($user->getEmailForVerification()), (string) $this->route('hash'))) {

            return false;
        }

        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill()
    {

       $user = User::find($this->route('id'));


       if (!$user) { //check for null here
            throw new AuthorizationException('User not found.');
        }


        if ($user->hasVerifiedEmail()) {
            throw new InvalidSignatureException;
        }

       $user->markEmailAsVerified();

       Auth::login($user);

        event(new Verified($user));
    }
}

