<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Classes;
use App\Models\ClassPosts;
use App\Models\ClassUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = DB::table('class_users as cu')
                    ->select('*')
                    ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
                    ->leftjoin('class as c', 'cu.class_id', '=', 'c.id_class')
                    ->where('cu.is_owner', '=', 1)
                    ->where('cu.user_id', '=', Auth::user()->id)
                    ->where('cu.class_id', '=', $id)
                    ->get();
        // dd($class);
        $posts = DB::table('class_posts as cp')
                    ->select('*')
                    ->leftjoin('users as u', 'cp.user_id', '=', 'u.id')
                    ->leftjoin('posts as p', 'cp.post_id', '=', 'p.id')
                    ->where('p.class_id', '=', $id)
                    ->get();
        // dd($posts);

        return view('teachers.dashboard', compact('class', 'posts'));            
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

    public function orang($id)
    {
        $kelas = $id;
        $teacher = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.class_id', '=', $id)
            ->get();
        $student = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.class_id', '=', $id)
            ->where('cu.is_owner', '=', 0)
            ->get();
        $count = DB::table('class_users as cu')
            ->select('*')
            ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.class_id', '=', $id)
            ->where('cu.is_owner', '=', 0)
            ->count();
        // dd($users);

        return view('teachers.detailorang', compact('teacher','student', 'kelas', 'count'));  
    }
}
