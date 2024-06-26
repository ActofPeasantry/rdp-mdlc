<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Question;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
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
        $tasks = Task::find($id);
        return view('backend.lecturer.task.question.create', compact('id','tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToastrFactory  $flasher, Request $request)
    {
        $no = Question::where('task_id',$request->task_id)->count();
        $question = new Question;
        $question->text = $request->text;
        $question->no = $no+1;
        $question->task_id = $request->task_id;

        if ($request->videoFile != null) {
            // $file = $request->file('videoFile')->getClientOriginalName();
            // $filename = pathinfo($file, PATHINFO_FILENAME);
            // $extension = pathinfo($file, PATHINFO_EXTENSION);
            // $new_name = $filename.time().'.'.$extension;

            // $disk = Storage::disk('google');
            // $disk->put($new_name, file_get_contents($request->videoFile) );
            // $question->video_file = $disk->url($new_name);

            $path=$request->file('videoFile')->store('uploads', 'public');
            $question->video_file = '../../../storage/'.$path;
        }

        if ($request->audioFile != null) {
            // $file = $request->file('audioFile')->getClientOriginalName();
            // $filename = pathinfo($file, PATHINFO_FILENAME);
            // $extension = pathinfo($file, PATHINFO_EXTENSION);
            // $new_name = $filename.time().'.'.$extension;

            // $disk = Storage::disk('google');
            // $disk->put($new_name, file_get_contents($request->audioFile) );
            // $question->audio_file = $disk->url($new_name);

            $path=$request->file('audioFile')->store('uploads', 'public');
            $question->audio_file = '../../../storage/'.$path;
        }
        $question->save();

        $flasher->addSuccess('Data berhasil ditambah');

        return redirect(route('lecturer.tasks.show', $request->task_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $question = Question::find($id);
        return view('backend.lecturer.task.question.detail', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $tasks = Task::find($question->task_id);
        return view('backend.lecturer.task.question.edit', compact('question','tasks'));
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
        $questions = Question::findOrFail($id);
        $questions->text = $request->text;
        $questions->max_score = $request->max_score;

        if ($request->videoFile != null) {
            // $file = $request->file('videoFile')->getClientOriginalName();
            // $filename = pathinfo($file, PATHINFO_FILENAME);
            // $extension = pathinfo($file, PATHINFO_EXTENSION);
            // $new_name = $filename.time().'.'.$extension;

            // $disk = Storage::disk('google');
            // $disk->put($new_name, file_get_contents($request->videoFile) );
            // $questions->video_file = $disk->url($new_name);

            $path=$request->file('videoFile')->store('uploads', 'public');
            $questions->video_file = '../../../storage/'.$path;
        }

        if ($request->audioFile != null) {
            // $file = $request->file('audioFile')->getClientOriginalName();
            // $filename = pathinfo($file, PATHINFO_FILENAME);
            // $extension = pathinfo($file, PATHINFO_EXTENSION);
            // $new_name = $filename.time().'.'.$extension;

            // $disk = Storage::disk('google');
            // $disk->put($new_name, file_get_contents($request->audioFile) );
            // $questions->audio_file = $disk->url($new_name);

            $path=$request->file('audioFile')->store('uploads', 'public');
            $questions->audio_file = '../../../storage/'.$path;
        }

        $questions->save();

        $flasher->addSuccess('Data berhasil diubah');
        return redirect(route('lecturer.tasks.show', $questions->task_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToastrFactory  $flasher, $id)
    {
        //dd($id);
        $question= Question::findorFail($id);
        // dd($question);
        $question->delete();
        $flasher->addError('Data dihapus');
        return redirect()->back();
    }
}
