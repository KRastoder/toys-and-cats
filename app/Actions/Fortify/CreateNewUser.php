<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:user,doctor'],
            'years_of_experience' => ['nullable', 'integer', 'min:0'],
            'speciality' => ['nullable', 'string', 'max:255'],
        ])->validate();

        return DB::transaction(function () use ($input) {

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => $input['role'],
            ]);

            if ($input['role'] === 'doctor') {

                Doctor::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'years_of_experience' => $input['years_of_experience'] ?? 0,
                    'speciality' => $input['speciality'] ?? '',
                ]);
            }

            return $user;
        });
    }
}
