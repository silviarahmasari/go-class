<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tasks = DB::table('tasks')
                    ->where('class_id', $id)
                    ->get();
        // dd($tasks);

        return view('teachers.tasks.index', compact('tasks', 'id'));            
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
    public function store(Request $request, $id)
    {
        $tasks = new Tasks;
        $tasks->task_title = $request->task_title;
        $tasks->task_description = $request->task_description;

        if($file = $request->hasFile('task_file')) {
            $file = $request->file('task_file') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/task_files' ;
            $file->move($destinationPath,$fileName);

            $tasks->task_file = $fileName;
        }

        $tasks->class_id = $id;
        $tasks->task_created_by = Auth::user()->id;
        $tasks->save();

        return redirect('teacher/task/index/'.$id)->with('success', 'Tugas berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_task)
    {
        $results = DB::table('result_tasks as rt')
                    ->join('tasks as t', 'rt.task_id', '=', 't.id')
                    ->join('class as c', 't.class_id', '=', 'c.id_class')
                    ->join('users as u', 'rt.user_id', '=', 'u.id')
                    ->where('t.class_id', $id)
                    ->where('t.id', $id_task)
                    ->get();
        // dd($results);            

        return view('teachers.tasks.show', compact('results'));       
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

    public function getResults($id, $id_task) {
        $results = DB::table('result_tasks as rt')
                    ->join('tasks as t', 'rt.task_id', '=', 't.id')
                    ->join('users as u', 'rt.user_id', '=', 'u.id')
                    ->where('t.class_id', $id)
                    ->where('t.id', $id_task)
                    ->get();
        
        return response()->json;
    }
}
