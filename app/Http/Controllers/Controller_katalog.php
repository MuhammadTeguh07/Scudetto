<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class Controller_katalog extends Controller
{
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            return view('/master/katalog', ['katalog' => $katalog]);
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
            $this->validate($request, [
                'foto' => 'required|mimes:jpg,jpeg,png'
            ]);
            $resource = $request->file('foto');
            $name = '/foto_katalog/'.time().'-'.$resource->getClientOriginalName();
            $resource->move(public_path('foto_katalog'), $name);
            DB::table('katalog')->insert([
                'nama_katalog' => $request->nama,
                'status_katalog' => $request->status,
                'foto_katalog' => $name
            ]);
            Session::flash('insert','Data Berhasil di Masukkan');
            return redirect('/katalog');
        }
    }
 
    public function edit(Request $request, $id)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $request->validate ([
                'foto' => 'mimes:jpg,jpeg,png',
            ]);

            $path = null;
            if($request->foto)
            {
                $path = '/foto_katalog/'.time().'-'.$request->foto->getClientOriginalName();
                $request->foto->move(public_path('foto_katalog'), $path);       
            }   
            else{
                $path = $request->foto2;
            }
            DB::table('katalog')->where('id_katalog',$id)->update([
                'nama_katalog' => $request->nama,
                'status_katalog' => $request->status,
                'foto_katalog' => $path
            ]);
            Session::flash('edit','Data Berhasil di Edit');
            return redirect('/katalog');   
        }
    }
}
