<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Dosen;
use App\Models\Admin;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view('backend.user.profile');
    }
}
