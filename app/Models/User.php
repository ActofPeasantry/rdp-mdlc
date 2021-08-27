<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function admins()
    {
        return $this->hasOne('App\Models\Admin');
    }

    public function lecturers()
    {
        return $this->hasOne('App\Models\Lecturer');
    }

    public function students()
    {
        return $this->hasOne('App\Models\Student');
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     *  Mencek apakah user yang login ada pada tabel admins
     * @return bool
     */
    public function isAdmin(){
        return null !== $this->admins()->first();
    }
    /**
     *  Mencek apakah user yang login ada pada tabel lecturers
     * @return bool
     */
    public function isLecturer(){
        return null !== $this->lecturers()->first();
    }
    /**
     *  Mencek apakah user yang login ada pada tabel students
     * @return bool
     */
    public function isStudent(){
        return null !== $this->students()->first();
    }
}
