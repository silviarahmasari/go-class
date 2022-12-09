<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('login');
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
     * @param  \App\Http\Requests\StoreLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoginRequest  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoginRequest $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }

    public function preLogin(){
        if(Auth::check()){
            // if(Auth::user()->role == 'admin'){
            //     return redirect('/class/index');
            // }
            // else{
            //     return redirect('/dashboard');
            // }
        }
        else{
            return view('login');
        }
    }

    public function postLogin(Request $request){
        $data = $request->only('email', 'password');
        if(Auth::attempt($data)){
            // if(Auth::user()->role == 'admin'){
            //     return redirect('/class/index');
            // }
            // else{
            //     return redirect('/dashboard');
            // }
            return view('welcome');
        }
        else{
            return view('login');
        }
    }

    public function preRegister(){
        return view('/register');
    }
    
    public function postRegister(Request $request)
    {
     $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required',
        'cpassword'=> 'required|same:password',
        // 'role'=>'required'
     ]);

     User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=> Hash::make($request->password),
        // 'role'=>$request->role
     ]);

     return redirect('/login');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
