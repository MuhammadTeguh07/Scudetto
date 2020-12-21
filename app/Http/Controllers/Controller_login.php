<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controller_login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/login/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cek(Request $request)
    {
        $email = $request->email;
        $password = $request->pasword;
 
        $data = DB::table('user')->where('email_user',$email)->first();
        if($data){
            if($data->pasword_user == $password){
                Session::put('nama',$data->nama_user);
                Session::put('jk',$data->jk_user);
                Session::put('jabatan',$data->jabatan_user);
                Session::put('/login',TRUE);
                if($data->jk_user == "0"){   
                    Session::put('laki',TRUE); 
                }
                if($data->jk_user == "1"){   
                    Session::put('perempuan',TRUE); 
                }
                if($data->jabatan_user == "Admin"){   
                    Session::put('admin',TRUE); 
                }
                if($data->jabatan_user == "Kasir"){
                    Session::put('kasir',TRUE);
                }
                return redirect('/dashboard');
            }
            else{
                Session::flash('fpassword','Password Tidak Terdaftar');
                return redirect('/login');
            }
        }
        else{
            Session::flash('femail','Email Tidak Terdaftar');
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        return redirect('/login');
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
}
