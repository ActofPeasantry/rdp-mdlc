<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\scoreDetail;
use App\Models\Score;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrFactory;
use Flasher\Prime\FlasherInterface;

class ScoreDetailController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = ScoreDetail::where('score_id', $id)->get();
        // dd($details);
        return view('backend.lecturer.assessment.show', compact('details'));
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

        $detail = ScoreDetail::find($request->id);
        $score = Score::find($detail->score_id);

        $detail->score = $request->score;
        $detail->save();
        // dd($detail);

        $sum_score = $detail->avg('score');
        $score->total_score = round($sum_score, 2);
        $score->save();

        // $new = new \DateTime();
        // $score = Score::find($detail->score_id);
        // $new2 = new \DateTime($score->start_at);

        // $bool = $new < $new2 ;
        // dd($bool);


        return redirect(route('lecturer.ScoreDetail.show', $detail->score_id));
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
