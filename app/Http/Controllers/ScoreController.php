<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\scoreDetail;
use App\Models\Task;
use App\Models\Classroom;
use App\Models\Question;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ToastrFactory $flasher, Request $request)
    {

        $task = Task::find($request->task_id);
        $now = new \DateTime();
        $start = new \DateTime($task->start_at);
        $end = new \DateTime($task->end_at);
        
        if($now >= $start && $now <= $end){
            $scores = Score::where('task_id', $request->task_id)
            ->where('student_id', Auth::user()->students->id)
            ->first();

            $detail=NULL;

            if($scores==NULL){
                //dd(date("d/m/Y h:i:s"));
                $scores = new Score;
                $scores->start_at = date("Y/m/d h:i:s");
                $scores->student_id = Auth::user()->students->id;
                $scores->task_id = $request->task_id;
                $scores->save();
            }

            $total = Question::where('task_id', $request->task_id)->count();
            $score_id =  $scores->id;

            $no = 0;
            if($request->no){
                $no += $request->no;
            }
            $questions = Question::where('task_id', $request->task_id)->get();
            $question = $questions[$no];
            
            return view('backend.student.score.index', compact('question', 'no', 'score_id', 'total', 'detail'));
        }else{
            $flasher->addWarning("Kuis hanya dapat dikerjakan pada waktu yang ditentukan");
            return redirect()->back();
        }


        $no = 0;
        if($request->no){
            $no += $request->no;
        }
        $questions = Question::where('task_id', $request->task_id)->get();
        $question = $questions[$no];

        return view('backend.student.score.index', compact('question', 'no', 'score_id', 'total', 'detail'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToastrFactory $flasher, Request $request)
    {
        $task = Task::find($request->task_id);
        $now = new \DateTime();
        $start = new \DateTime($task->start_at);
        $end = new \DateTime($task->end_at);
        
        if($now >= $start && $now <= $end){
            //dd($request);
        //dd($request);
        $detail = scoreDetail::where('score_id', $request->score_id)
        ->where('question_id', $request->question_id)->first();


        $scores = Score::where('task_id', $request->task_id)
        ->where('student_id', Auth::user()->students->id)
        ->first();

        $score_id =  $scores->id;

        if(!$detail){
            $detail = new scoreDetail;
            $detail->text = $request->text;
            $detail->score_id = $request->score_id;
            $detail->question_id = $request->question_id;
            $detail->save();
        }else{
            $detail->text = $request->text;
            $detail->score_id = $request->score_id;
            $detail->question_id = $request->question_id;
            $detail->save();
        }

        $questions = Question::where('task_id', $request->task_id)->get();

        $total = Question::where('task_id', $request->task_id)->count();
        $no = $request->no + 1;
        //dd($no);
        if($no < $total){
            $question = $questions[$no];
            $detail = scoreDetail::where('score_id', $request->score_id)
            ->where('question_id', $request->question_id)->first();

            $scores = Score::where('task_id', $request->task_id)
            ->where('student_id', Auth::user()->students->id)
            ->first();

            $score_id =  $scores->id;

            if(!$detail){
                $detail = new scoreDetail;
                $detail->text = $request->text;
                $detail->score_id = $request->score_id;
                $detail->question_id = $request->question_id;
                $detail->save();
            }else{
                $detail->text = $request->text;
                $detail->score_id = $request->score_id;
                $detail->question_id = $request->question_id;
                $detail->save();
            }

            $questions = Question::where('task_id', $request->task_id)->get();

            $total = Question::where('task_id', $request->task_id)->count();
            $no = $request->no + 1;
            //dd($no);
            if($no < $total){
                $question = $questions[$no];
                $detail = scoreDetail::where('score_id', $request->score_id)
                ->where('question_id', $question->id)->first();
                return view('backend.student.score.index', compact('question', 'no', 'score_id', 'total', 'detail'));
            }else{
                $tasks = Task::find($request->task_id);
                $id = $tasks->classroom_id;
                $classrooms = Classroom::find($tasks->classroom_id);
                $tasks = Task::where('classroom_id', $classrooms->id)->get();
                $status = 'kuis';
                return view('backend.lecturer.classroom.detail', compact('classrooms','tasks','id','status'));
            }
        }else{
            $flasher->addWarning("Kuis hanya dapat dikerjakan pada waktu yang ditentukan");
            return redirect(route('classrooms.task', $task->classroom_id));
        }
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
