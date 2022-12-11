<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\ClassPosts;
use App\Models\Posts;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.dashboard');
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
        $posts = new Posts;
        $posts->post_title = $request->post_title;
        $posts->post_description = $request->post_description;
        $posts->post_file = $request->post_file;
        $posts->class_id = $id;
        $posts->save();

        $cp = new ClassPosts;
        $cp->post_id = $posts->id;
        $cp->user_id = Auth::user()->id;
        $cp->save();

        return redirect('students/dashboard/'.$id)->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = $id;
        $class = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->leftjoin('class as c', 'cu.class_id', '=', 'c.id_class')
            ->where('cu.is_owner', '=', 0)
            ->where('cu.user_id', '=', Auth::user()->id)
            ->where('cu.class_id', '=', $id)
            ->get();

        $posts = DB::table('class_posts as cp')
            ->select('*')
            ->leftjoin('users as u', 'cp.user_id', '=', 'u.id')
            ->leftjoin('posts as p', 'cp.post_id', '=', 'p.id')
            ->where('p.class_id', '=', $id)
            ->get();

        return view('students.dashboard', compact('class', 'posts', 'kelas'));   
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

    public function tugasKelas($id) 
    {
        $kelas = $id;
        $tugas = DB::table('tasks as t')
            ->select('*')
            ->leftjoin('class as c', 't.class_id', '=', 'c.id_class')
            ->where('t.class_id', '=', $id)
            ->get();
        // dd($kelas);

        return view('students.tugaskelas', compact('tugas', 'kelas'));  
    }

    public function detailTugas($id) 
    {
        $kelas = $id;
        $tugas = DB::table('tasks as t')
            ->select('*')
            ->leftjoin('result_tasks as rt', 't.id', '=', 'rt.task_id')
            ->leftjoin('users as u', 'u.id', '=', 't.task_created_by')
            ->where('t.id', '=', $id)
            ->get();
        // dd($tugas);

        return view('students.detailtugas', compact('tugas', 'kelas'));
    }

    public function orang($id)
    {
        $kelas = $id;
        $users = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.class_id', '=', $id)
            ->get();
        $count = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.class_id', '=', $id)
            ->where('cu.is_owner', '=', 0)
            ->count();
        // dd($users);

        return view('students.detailorang', compact('users', 'kelas', 'count'));  
    }
}