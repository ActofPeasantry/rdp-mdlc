<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    use PasswordValidationRules;
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        // Update kalau yang login adalah admin
        if ($user->isAdmin()) {
            $role = $user->admins()->first(); //Ambil data admin

            Validator::make($input, [
                'username' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'birthplace' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:18'],
                'address' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
            ])->validateWithBag('updateProfileInformation');

            if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            }
            else {
                $user->forceFill([
                    'username' => $input['username'],
                    'email' => $input['email'],
                ])->save();

                $role->forceFill([
                    'name' => $input['name'],
                    'birthplace' => $input['birthplace'],
                    'address' => $input['address'],
                    'phone' => $input['phone'],
                ])->save();
            }
        }

        elseif ($user->isStudent()) {
            $role = $user->students()->first(); //Ambil data Mahasiswa

            Validator::make($input, [
                'username' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'nim' => ['required', 'string', 'max:20'],
                'name' => ['required', 'string', 'max:255'],
                'birthplace' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:18'],
                'address' => ['required', 'string', 'max:255'],
            ])->validateWithBag('updateProfileInformation');

            if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            }
            else {
                $user->forceFill([
                    'username' => $input['username'],
                    'email' => $input['email'],
                ])->save();

                $role->forceFill([
                    'nim' => $input['nim'],
                    'name' => $input['name'],
                    'birthplace' => $input['birthplace'],
                    'phone' => $input['phone'],
                    'address' => $input['address'],
                ])->save();
            }
        }

        elseif ($user->isLecturer()) {
            $role = $user->lecturers()->first(); //Ambil data Dosen
            // dd($role);
            Validator::make($input, [
                'username' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'nip' => ['required', 'string', 'max:20'],
                'name' => ['required', 'string', 'max:255'],
                'birthplace' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:18'],
                'address' => ['required', 'string', 'max:255'],
            ])->validateWithBag('updateProfileInformation');

            if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            }
            else {
                $user->forceFill([
                    'username' => $input['username'],
                    'email' => $input['email'],
                ])->save();

                $role->forceFill([
                    'nip' => $input['nip'],
                    'name' => $input['name'],
                    'birthplace' => $input['birthplace'],
                    'address' => $input['address'],
                    'phone' => $input['phone'],
                ])->save();
            }
        }

        else{
            return redirect()->back();
        }
        // dd($role);


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
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
