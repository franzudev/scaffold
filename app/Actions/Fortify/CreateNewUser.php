<?php

namespace App\Actions\Fortify;

use App\Http\Helpers\Initials;
use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use Avatar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $userRequest = new UsersFormRequest();
        Validator::make($input, $userRequest->rules(), [
            'birth_date.required' => 'Questo campo è obbligatorio',
            'password.length' => 'Il campo password deve avere almeno 8 caratteri'
        ])->validate();

        $user = User::create([
            'username' => $input['username'],
            'birth_date' => $input['birth_date'],
            'email' => $input['email'],
            'name' => $input['name'],
            'surname' => $input['surname'],
            'phone' => $input['phone'],
            'residence' => $input['residence'],
            'password' => Hash::make($input['password']),
        ]);

        $avatar = Avatar::create(Initials::generate($user->username))->getImageObject()->encode('png');
        Storage::put('avatars/' . $user->id . '/avatar.png', (string) $avatar);

        $rolesNames = Arr::pluck($input['roles'], ['name']);
        $user->assignRole($rolesNames);

        return $user;
    }
}
