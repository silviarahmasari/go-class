<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }

    public function authenticate(Request $request)
    {
       $check = Users::where('email', '=', $request->email)
        ->where('password', Hash::check('password', $request->password))
        ->first();
        // dd($check);

        if($check){
            $request->session()->put('LoggedUser', $check->id_user);
            return redirect()->intended('/class/index');
        }
 
        return back()->with('LoginError', 'Login failed');
    }

    public function logout()
    {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $users = new Users;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->password = Hash::make($request->password);
        $users->save();

        return redirect('login')->with('success', 'Registration Success');
    }
}        
