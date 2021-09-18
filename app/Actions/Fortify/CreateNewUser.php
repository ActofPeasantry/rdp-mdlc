<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Flasher\Toastr\Prime\ToastrFactory;

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
        try{
            if($input['role']=='dosen'){
                $validator = Validator::make($input, [
                    'nip' => ['required', 'string', 'max:20'],
                    'name' => ['required', 'string', 'max:255'],
                    'birthplace' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'string', 'max:18'],
                    'address' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'max:255'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique(User::class),
                    ],
                    'password' => $this->passwordRules(),
                ]);

                $validator->validate();
                
                

                $user = new User;
                $user->username = $input['username'];
                $user->email = $input['email'];
                $user->password = $input['password'];
                $user->save();

                $lecturer = new Lecturer;
                $lecturer->name = $input['name'];
                $lecturer->nip = $input['nip'];
                $lecturer->birthplace = $input['birthplace'];
                $lecturer->address = $input['address'];
                $lecturer->phone = $input['phone'];
                $lecturer->user_id = $user->id;
                $lecturer->save();

                return $user;
            }elseif($input['role']=='mahasiswa'){
                Validator::make($input, [
                    'nim' => ['required', 'string', 'max:20'],
                    'name' => ['required', 'string', 'max:255'],
                    'birthplace' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'string', 'max:18'],
                    'address' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'max:255'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique(User::class),
                    ],
                    'password' => $this->passwordRules(),
                ])->validate();
                $user = new User;
                $user->username = $input['username'];
                $user->email = $input['email'];
                $user->password = $input['password'];
                $user->save();

                $student = new Student;
                $student->name = $input['name'];
                $student->nim = $input['nim'];
                $student->birthplace = $input['birthplace'];
                $student->address = $input['address'];
                $student->phone = $input['phone'];
                $student->user_id = $user->id;
                $student->save();

                return $user;
            }
        }catch(\Exception $e){
            return redirect()->back();
        }
    }
}
