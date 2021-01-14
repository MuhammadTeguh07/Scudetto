<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_user extends Controller
{
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $user = DB::table('user')->orderby('id_user', 'asc')->get();
            return view('/master/user', ['user' => $user]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            DB::table('user')->insert([
                'nama_user' => $request->nama,
                'pasword_user' => $request->password,
                'email_user' => $request->email,
                'no_tlp_user' => $request->no_tlp,
                'alamat_user' => $request->alamat,
                'jk_user' => $request->jk,
                'jabatan_user' => $request->jabatan,
                'status_user' => $request->status
            ]);
            Session::flash('insert','Data Berhasil di Masukkan');
            return redirect('/user');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            DB::table('user')->where('id_user',$request->ID)->update([
                'nama_user' => $request->nama,
                'pasword_user' => $request->password,
                'email_user' => $request->email,
                'no_tlp_user' => $request->no_tlp,
                'alamat_user' => $request->alamat,
                'jk_user' => $request->jk,
                'jabatan_user' => $request->jabatan,
                'status_user' => $request->status
            ]);
            Session::flash('edit','Data Berhasil di Edit');
            return redirect('/user');
        }
    }
}
