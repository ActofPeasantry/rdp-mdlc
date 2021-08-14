<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        // dd($lecturers->find(2)->users);
        return view('backend.admin.manage_lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturer = Lecturer::all();
        // $users = User::all();
        // dd($lecturer->name);
        return view('backend.admin.manage_lecturer.create', compact('lecturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory  $flasher)
    {
        $user = User::create($request->except([
            '_Token',
            'nip',
            'name',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        // dd($user->id);
        $lecturer = new Lecturer;
            $lecturer->nip = $request->nip;
            $lecturer->name = $request->name;
            $lecturer->birthplace = $request->birthplace;
            $lecturer->phone = $request->phone;
            $lecturer->address = $request->address;

            $lecturer->user_id = $user->id;
        $lecturer->save();

        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('admin.lecturers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $user =  User::all();
        // $roles = Role::all();
        // dd($user->roles->pluck('id')->toArray());
        return view('backend.admin.manage_lecturer.edit', compact('lecturer', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToastrFactory  $flasher, $id)
    {
        $user = User::findOrFail($request->user_id);
        // dd($user);
        $user->update($request->except([
            '_Token',
            'nip',
            'name',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        // dd($user->id);
        $lecturer = Lecturer::findOrFail($id);
            $lecturer->nip = $request->nip;
            $lecturer->name = $request->name;
            $lecturer->birthplace = $request->birthplace;
            $lecturer->phone = $request->phone;
            $lecturer->address = $request->address;
        $lecturer->save();

        $flasher->addSuccess('Data berhasil diubah');

        return redirect(route('admin.lecturers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToastrFactory  $flasher, $id)
    {
        $user= User::findorFail($id);
        // dd($user);
        $user->delete();
        $flasher->addWarning('Data dihapus');
        return redirect()->back();
    }
}
