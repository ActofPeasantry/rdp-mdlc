<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::id();
        // $user = User::find($id);;
        // dd($user->isAdmin());
        $admins = Admin::all();
        return view('backend.admin.manage_admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::all();
        // dd($lecturers->find(2)->users);
        return view('backend.admin.manage_admin.create', compact('admin'));
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
            'name',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        // dd($user->id);
        $admin = new Admin;
            $admin->name = $request->name;
            $admin->birthplace = $request->birthplace;
            $admin->phone = $request->phone;
            $admin->address = $request->address;

            $admin->user_id = $user->id;
        $admin->save();

        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('admin.admins.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrfail($id);
        $user =  User::all();        // $users = User::all();
        // dd($lecturer->name);
        return view('backend.admin.manage_admin.edit', compact('admin', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToastrFactory  $flasher, $id)
    {
        $user = User::findOrFail($request->user_id);

        $user->update($request->except([
            '_Token',
            'name',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        // dd($user->id);
        $admin = Admin::findOrFail($id);
            $admin->name = $request->name;
            $admin->birthplace = $request->birthplace;
            $admin->phone = $request->phone;
            $admin->address = $request->address;

            $admin->user_id = $user->id;
        $admin->save();

        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('admin.admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
