<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Classroom;
use App\Models\Task;
use App\Models\ClassroomDetail;
use App\Models\StudyMaterial;
use App\Models\Student;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(Auth::user()->lecturers->id);
        if($request->data == 'lecturer-data'){
            $classrooms = Classroom::where('lecturer_id', Auth::user()->lecturers->id)->get();
        }else{
            $classrooms = Classroom::select('classrooms.*')
            ->join('classroom_details', 'classrooms.id', '=', 'classroom_details.classroom_id')
            ->where('student_id', Auth::user()->students->id)->get();
        }

        return view('backend.lecturer.classroom.index', compact('classrooms'));
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
    public function store(ToastrFactory  $flasher, Request $request)
    {
        // dd(Auth::user());
        $kode_unik = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890zyxwvutsrqponmlkjihgfedcba"), 14, 10);

        $classrooms = new Classroom;
        $classrooms->name = $request->name;
        $classrooms->lecturer_id = Auth::user()->lecturers->id;
        $classrooms->code = $kode_unik;
        $classrooms->save();

        $flasher->addSuccess('Data berhasil ditambah');

    return redirect(route('lecturer.classrooms.index','data=lecturer-data'));
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
    public function storeJoin(Request $request, ToastrFactory  $flasher)
    {
        //dd($request);
        $classrooms = Classroom::where('code', $request->code)->first();
        if($classrooms){
            $cek = ClassroomDetail::where('classroom_id', $classrooms->id)
            ->where('student_id', Auth::user()->students->id)->first();
            if(!$cek){
                $detail = new ClassroomDetail;
                $detail->Classroom_id = $classrooms->id;
                $detail->student_id = Auth::user()->students->id;
                $detail->save();
                $flasher->addSuccess('Berhasil masuk kelas');
            }else{
                $flasher->addError('Anda telah berada di kelas');
            }
        }else{
            $flasher->addError('Kelas tidak tersedia');
        }   
        return redirect(route('lecturer.classrooms.index', 'data=data-student'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classrooms = Classroom::find($id);
        return view('backend.lecturer.classroom.materi', compact('classrooms','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function materi($id)
    {
        $classrooms = Classroom::find($id);
        $materials =  StudyMaterial::where('classroom_id', $id)->get();
        // dd($materials[0]->abstract);
        $status = 'materi';
        return view('backend.lecturer.classroom.detail', compact('classrooms','id','status', 'materials'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function members($id)
    {
        $classrooms = Classroom::find($id);
        $status = 'members';
        return view('backend.lecturer.classroom.detail', compact('classrooms','id','status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function task($id)
    {
        $classrooms = Classroom::find($id);
        $tasks = Task::where('classroom_id', $id)->get();
        $student= Student::where('user_id', Auth::user()->id)->first();
        // dd($student->id);
        // dd( $tasks[0]->scores->where('student_id', $student->id)->first()->total_score);
        $status = 'kuis';
        return view('backend.lecturer.classroom.detail', compact('classrooms','tasks','id','status', 'student'));
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
    public function update(ToastrFactory  $flasher, Request $request, $id)
    {
        $classrooms = Classroom::findOrFail($id);
            $classrooms->name = $request->name;
        $classrooms->save();

        $flasher->addSuccess('Data berhasil diubah');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToastrFactory  $flasher, $id)
    {
        $classrooms= Classroom::findorFail($id);
        // dd($classrooms);
        $classrooms->delete();
        $flasher->addError('Data dihapus');

        return redirect()->back();
    }
}
