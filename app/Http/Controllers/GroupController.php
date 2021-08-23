<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Group;
use App\Models\groupDetail;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('backend.lecturer.classroom.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lecturer.classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user());
        $kode_unik = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890zyxwvutsrqponmlkjihgfedcba"), 14, 10);

        $group = new Group;
        $group->name = $request->name;
        $group->lecturer_id = Auth::user()->lecturers->id;
        $group->code = $kode_unik;
        $group->save();

        //$flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('lecturer.classrooms.index'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join()
    {
        return view('backend.lecturer.classroom.join');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJoin(Request $request)
    {
        //dd($request);
        $group = Group::where('code', $request->code)->first();
        if($group){
            $detail = new groupDetail;
            $detail->group_id = $group->id;
            $detail->student_id = Auth::user()->students->id;
            $detail->save();
            //$flasher->addSuccess('Berhasil masuk kelas');
        }else{
            //$flasher->addFailed('Kelas tidak tersedia');
        }

        return redirect(route('lecturer.classrooms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::find($id);
        return view('backend.lecturer.classroom.materi', compact('groups','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function materi($id)
    {
        $groups = Group::find($id);
        return view('backend.lecturer.classroom.materi', compact('groups','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function members($id)
    {
        $groups = Group::find($id);
        return view('backend.lecturer.classroom.members', compact('groups','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
