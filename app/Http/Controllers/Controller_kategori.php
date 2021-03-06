<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_kategori extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $kategori = DB::table('kategori')->orderby('id_kategori', 'asc')->get();
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            return view('/master/kategori', ['kategori' => $kategori, 'katalog' => $katalog]);
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
            DB::table('kategori')->insert([
                'id_katalog' => $request->katalog,
                'nama_kategori' => $request->nama,
                'status_kategori' => $request->status
            ]);
            Session::flash('insert','Data Berhasil di Masukkan');
            return redirect('/kategori');
        }
    }

    public function edit(Request $request)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            DB::table('kategori')->where('id_kategori',$request->ID)->update([
                'id_katalog' => $request->katalog,
                'nama_kategori' => $request->nama,
                'status_kategori' => $request->status
            ]);
            Session::flash('edit','Data Berhasil di Edit');
            return redirect('/kategori');
        }
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
