<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $users = Users::all();

        return view('users.index', compact('users'));
=======
        return view('login');
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('users.create');
=======
        //
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $users = new Users;
        $users->id_user = $request->id_user;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();

        return redirect('users')->with('success', 'User created succesfully.');
=======
        //
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
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
<<<<<<< HEAD
=======

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required']
        // ]);
        
        $check = Users::where('email', '=', $request->email)
        ->where('password', '=', $request->password)
        ->first();
        // dd($check);

        if($check){
            $request->session()->put('LoggedUser', $check->id_user);
            return redirect('/class/index');
        }
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }
 
        return back()->with('LoginError', 'Login failed');
    }

    public function logout()
    {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
}
