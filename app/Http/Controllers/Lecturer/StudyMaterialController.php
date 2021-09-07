<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\StudyMaterial;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrFactory;


class StudyMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $classroom = Classroom::find($id);
        // dd($classroom );
        return view('backend.lecturer.study_material.create', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory  $flasher)
    {
        // dd($request->all());
        $study = StudyMaterial::create($request->all());
        $flasher->addSuccess('Data berhasil ditambah');
        return redirect()->route('lecturer.classrooms.materi', $study->classroom_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(StudyMaterial $studyMaterial, $id)
    {
        $study = StudyMaterial::find($id);
        // dd($study);
        return view('backend.lecturer.study_material.show', compact('study'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyMaterial $studyMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyMaterial $studyMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyMaterial $studyMaterial)
    {
        //
    }
}
