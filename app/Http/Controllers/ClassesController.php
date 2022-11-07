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
        $data = Classes::with('users')->whereRelation('users', 'id_user', '=', session('LoggedUser'))->get();
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
        $classes = new Classes;
        $classes->user_id = session('LoggedUser');
        $classes->class_name = $request->class_name;
        $classes->class_code = $request->class_code;
        $classes->class_desc = $request->class_desc;
        $classes->class_status = $request->class_status;

        $classes->save();

        return redirect('class/index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes, $id)
    {
        $user = Users::where('id_user', '=', session('LoggedUser'))->first();
        $classes = Classes::where('id_class', '=', $id)
        ->with('users')
        ->get();
        // dd($classes);
        if(!$user){
            return redirect('/login')->with('error', 'Login fisrt!');
        }

        return view('class.show', compact('classes', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes, $id)
    {
        $user = Users::where('id_user', '=', session('LoggedUser'))->first();
        $classes = Classes::where('id_class', '=', $id)
        ->with('users')
        ->get();
        // dd($classes);
        if(!$user){
            return redirect('/login')->with('error', 'Login fisrt!');
        }

        return view('class.edit', compact('classes', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes, $id)
    {
        $classes = Classes::find($id);
        $classes->user_id = session('LoggedUser');
        $classes->class_name = $request->class_name;
        $classes->class_code = $request->class_code;
        $classes->class_desc = $request->class_desc;
        $classes->class_status = $request->class_status;

        $classes->update();

        return redirect('class/index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes, $id)
    {
        //
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect('class/index')->with('success', 'Class Data is successfully deleted');
    }
}
