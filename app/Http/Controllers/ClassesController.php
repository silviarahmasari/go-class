<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Users::where('id_user', '=', session('LoggedUser'))->first();
        $data = Classes::with('users')->get();
        // dd($data);
        if(!$user){
            return redirect('/login')->with('error', 'Login fisrt!');
        }

        return view('class.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Users::where('id_user', '=', session('LoggedUser'))->first();

        if(!$user){
            return redirect('/login')->with('error', 'Login fisrt!');
        }

        return view('class.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new Classes;
        $class->user_id = $request->user_id;
        $class->class_name = $request->class_name;
        $class->class_code = $request->class_code;
        $class->class_desc = $request->class_desc;
        $class->class_status = $request->class_status;

        $class->save();

        return redirect('class/index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        $user = Users::where('id_user', '=', session('LoggedUser'))->first();
        $data = Classes::find(1)->users;
        // dd($data);
        if(!$user){
            return redirect('/login')->with('error', 'Login fisrt!');
        }

        return view('class.edit', compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        $class = Classes::find($classes);
        $class->user_id = $request->user_id;
        $class->class_name = $request->class_name;
        $class->class_code = $request->class_code;
        $class->class_desc = $request->class_desc;
        $class->class_status = $request->class_status;

        $class->update();

        return redirect('class/index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_class)
    {
        $class = Classes::findOrFail($id_class);
        $class->delete();

        return redirect('class/index')->with('success', 'Class Data is successfully deleted');
    }
}
