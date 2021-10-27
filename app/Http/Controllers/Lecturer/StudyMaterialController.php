<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudyMaterial;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request, ToastrFactory  $flasher )
    {
        // dd( $request->all());
        // $study = StudyMaterial::create($request->all());
        $study = new StudyMaterial();
        $study->title = $request->title;
        $study->abstract = $request->abstract;
        $study->description = $request->description;
        $study->classroom_id = $request->classroom_id;

        if ($request->videoFile != null) {
            $file = $request->file('videoFile')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $new_name = $filename.time().'.'.$extension;

            $disk = Storage::disk('google');
            $disk->put($new_name, file_get_contents($request->videoFile) );
            $study->video_file = $disk->url($new_name);

            // $path=$request->file('videoFile')->store('uploads', 'public');
            // $study->video_file = '../../../storage/'.$path;
            // $study->save();
        }

        if ($request->audioFile != null) {
            $file = $request->file('audioFile')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $new_name = $filename.time().'.'.$extension;

            $disk = Storage::disk('google');
            $disk->put($new_name, file_get_contents($request->audioFile) );
            $study->audio_file = $disk->url($new_name);

            // $path=$request->file('videoFile')->store('uploads', 'public');
            // $study->audio_file = '../../../storage/'.$path;
            // $study->save();
        }
        $study->save();

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
        return view('backend.lecturer.study_material.show', compact('study'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyMaterial $studyMaterial, $id)
    {
        $user =  User::all();
        $study= StudyMaterial::findOrFail($id);
        $classroom = StudyMaterial::find($id)->classroom;
        // dd($studyMaterial->id);
        return view('backend.lecturer.study_material.edit', compact('study', 'classroom', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToastrFactory  $flasher, $id)
    {
        // dd($request->all());
        $study= StudyMaterial::findOrFail($id);
        $study->title = $request->title;
        $study->abstract = $request->abstract;
        $study->description = $request->description;

        if ($request->videoFile != null) {
            $file = $request->file('videoFile')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $new_name = $filename.time().'.'.$extension;

            $disk = Storage::disk('google');
            $disk->put($new_name, file_get_contents($request->videoFile) );
            $study->video_file = $disk->url($new_name);

            // $path=$request->file('videoFile')->store('uploads', 'public');
            // $study->video_file = '../../../storage/'.$path;
            // $study->save();
        }

        if ($request->audioFile != null) {
            $file = $request->file('audioFile')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $new_name = $filename.time().'.'.$extension;

            $disk = Storage::disk('google');
            $disk->put($new_name, file_get_contents($request->audioFile) );
            $study->audio_file = $disk->url($new_name);

            // $path=$request->file('videoFile')->store('uploads', 'public');
            // $study->audio_file = '../../../storage/'.$path;
            // $study->save();
        }

        $study->save();

        $flasher->addSuccess('Data berhasil diubah');
        // dd($request->all());
        return redirect(route('lecturer.classrooms.materi', [$request->classroom_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyMaterial $studyMaterial, ToastrFactory  $flasher, $id)
    {
        $study= StudyMaterial::findorFail($id);
        dd($study);
        $study->delete();
        $flasher->addWarning('Data dihapus');
        return redirect()->back();
    }
}
