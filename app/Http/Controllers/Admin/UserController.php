<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.admin.manage_user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('backend.admin.manage_user.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory  $flasher)
    {
        $user = User::create($request->except(['_Token', 'roles']));
        // memasukkan data ke tabel transaksaksi (user_role)
        // $user->roles()->sync($request->roles);
        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('admin.users.index'));
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        // dd($user->roles->pluck('id')->toArray());
        return view('backend.admin.manage_user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ToastrFactory  $flasher)
    {
        $user = User::findOrFail($id);
        $user->update($request->except(['_Token', 'roles']));
        // memasukkan data ke tabel transaksaksi (user_role)
        $user->roles()->sync($request->roles);
        $flasher->addSuccess('Data berhasil diubah');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ToastrFactory  $flasher)
    {
        // dd("deleted");
        $user= User::findOrFail($id);
        $user->delete();
        $flasher->addWarning('Data dihapus');
        return redirect()->back();
    }
}
