<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_futsal extends Controller
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
            $produk = DB::table('produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('katalog', 'kategori.id_katalog', '=', 'katalog.id_katalog')->get();
            $kategori = DB::table('kategori')->orderby('id_kategori', 'asc')->get();
            return view('/master/futsal', ['produk' => $produk, 'kategori' => $kategori]);
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
            $path = '/Foto_Futsal/'.time().'-'.$resource->getClientOriginalName();
            $resource->move(public_path('Foto_Futsal'), $path);
            DB::table('produk')->insert([
                'id_kategori' => $request->kategori,
                'nama_produk' => $request->nama,
                'tgl_produk' => $request->tanggal, 
                'harga_produk' => $request->harga,
                'stok_produk' => $request->stok,
                'ukuran_produk' => $request->ukuran,
                //dd('ukuran')->exit,
                'keterangan_produk' => $request->keterangan,
                'status_produk' => $request->status,
                'foto_produk' => $path
            ]);
            //mengalihkan halaman ke halaman customer
            Session::flash('insert','Data Berhasil di Masukkan');
            return redirect('/futsal');
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
                $path = '/Foto_Futsal/'.time().'-'.$request->foto->getClientOriginalName();
                $request->foto->move(public_path('Foto_Futsal'), $path);       
            }   
            else{
                $path = $request->foto2;
            }
            DB::table('produk')->where('id_produk',$id)->update([
                'id_kategori' => $request->kategori,
                'nama_produk' => $request->nama,
                'harga_produk' => $request->harga,
                'stok_produk' => $request->stok,
                'ukuran_produk' => $request->ukuran,
                'keterangan_produk' => $request->keterangan,
                'status_produk' => $request->status,
                'foto_produk' => $path
            ]);
            Session::flash('edit','Data Berhasil di Edit');
            return redirect('/futsal'); 
        }
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
