<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Classes;
use App\Models\ClassUsers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = DB::table('class_users as cu')
                    ->select('*')
                    ->leftjoin('users as u', 'cu.user_id', '=', 'u.id')
                    ->leftjoin('class as c', 'cu.class_id', '=', 'c.id_class')
                    ->where('cu.user_id', '=', Auth::user()->id)
                    ->get();           

        return view('beranda', compact('class'));
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
        //
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

    public function gabungKelas(Request $request) 
    {
        $kode_kelas = DB::table('class')
            ->select('class_code')
            ->get();
        $count = DB::table('class')
            ->select('class_code')
            ->count();

        for ( $i=0; $i<=$count; $i++ ) {
            if ($request->class_code == $kode_kelas[$i]->class_code) {
                
                $code = DB::table('class')
                    ->select('id_class')
                    ->where('class_code', $request->class_code)
                    ->get();
                
                $cu = new ClassUsers;
                $cu->class_id = $code[0]->id_class;
                $cu->user_id = Auth::user()->id;
                $cu->is_owner = 0;
                $cu->save();

                return redirect('beranda')->with('success', 'Berhasil gabung di kelas');
            } else {
                return redirect('beranda')->with('error', 'Periksa kode kelas Anda');
            }
        }

    }
}
