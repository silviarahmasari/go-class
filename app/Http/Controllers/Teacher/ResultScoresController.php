<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\ResultScores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResultScoresController extends Controller
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
    public function store(Request $request, $id_user, $id_task)
    {
        $score = new ResultScores;
        $score->user_id = $id_user;
        $score->task_id = $id_task;
        $score->result_score = $request->result_score;
        $score->result_score_created_by = Auth::user()->id;
        $score->save();

        return redirect("teacher/resultscore/show/".$id_user."/".$id_task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user, $id_task)
    {
        $user = DB::table('users')
                    ->where('id', $id_user)
                    ->get();
                  
        $score = ResultScores::where('task_id', $id_task)
                            ->where('user_id', $id_user)
                            ->get();            

        $results = DB::table('result_tasks as rt')
                    ->join('users as u', 'u.id', '=', 'rt.user_id')
                    ->where('rt.user_id', $id_user)
                    ->where('rt.task_id', $id_task)
                    ->get();
        // dd($user);            

        return view('teachers.scores.show', compact('results', 'user', 'score'));
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
