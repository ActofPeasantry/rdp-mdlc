<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // dd($lecturers->find(2)->users);
        return view('backend.admin.manage_student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();        // $users = User::all();
        // dd($lecturer->name);
        return view('backend.admin.manage_student.create', compact('student'));
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
            'nim',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        


        $student = new Student;
            $student->nim = $request->nim;
            $student->name = $request->name;
            $student->birthplace = $request->birthplace;
            $student->phone = $request->phone;
            $student->address = $request->address;

            $student->user_id = $user->id;
        $student->save();

        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('admin.students.index'));
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
        $student = Student::findOrfail($id);
        $user =  User::all();        // $users = User::all();
        // dd($lecturer->name);
        return view('backend.admin.manage_student.edit', compact('student', 'user'));
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
            'nim',
            'name',
            'birthplace',
            'phone',
            'address',
            'user_id',])
        );

        // dd($user->id);
        $student = Student::findOrFail($id);
            $student->nim = $request->nim;
            $student->name = $request->name;
            $student->birthplace = $request->birthplace;
            $student->phone = $request->phone;
            $student->address = $request->address;

            $student->user_id = $user->id;
        $student->save();

        $flasher->addSuccess('Data berhasil diubah');

        return redirect(route('admin.students.index'));
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
