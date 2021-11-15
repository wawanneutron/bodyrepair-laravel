<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'no_wa' => ['required', 'string', 'max:12', 'min:12'],
            'alamat' => ['required', 'string', 'max:255'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // cek jika tidak ada request gambar
            if (request()->file('avatar') == null) {
                $user->forceFill([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'no_wa' => $input['no_wa'],
                    'alamat' => $input['alamat'],
                    'email' => $input['email'],
                ])->save();
            } else {
                // hapsu photo lama
                Storage::disk('local')->delete('public/' . $user->avatar);

                // dan update photo dan data baru
                $user->forceFill([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'no_wa' => $input['no_wa'],
                    'alamat' => $input['alamat'],
                    'email' => $input['email'],
                    'avatar' => $input['avatar'] = request()->file('avatar')
                        ->store('profile-images', 'public'),
                ])->save();
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'no_wa' => $input['no_wa'],
            'alamat' => $input['alamat'],
            'email' => $input['email'],
            'avatar' => $input['avatar'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
