<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\DetailUser;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),]);
            
        function (User $user){
            $this->createTeam($user);

            // add to detail users
            $detail_user =new DetailUsers;
            $Detail_user->users_id = $user->id;
            $detail_user->photo = NULL;
            $detail_user->role = NULL;
            $detail_user->contact_number = NULL;
            $detail_user->biography = NULL;
            $detail_user->save();
        };
    }
}
