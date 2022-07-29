<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255','ends_with:kawisata.id', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ],
        [
            'email.unique' => 'email sudah ada',
            'email.ends_with' => 'email @kawisata.id',
            'id.unique' => 'NIP sudah ada'
        ]
        )->validate();

        return User::create([
            'name' => $input['name'],
            'id' => $input['id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        // ->attachRole('user');
    }
}
