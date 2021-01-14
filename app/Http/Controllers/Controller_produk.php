<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_produk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $produk = DB::table('produk')
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->join('katalog', 'katalog.id_katalog', '=', 'kategori.id_katalog')
            ->get();
            $katalog2 = DB::table('katalog')->where('id_katalog', $id)->get();
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            $kategori = DB::table('kategori')->orderby('id_kategori', 'asc')->get();
            return view('/master/produk', ['produk'=>$produk, 'kategori'=>$kategori, 'katalog'=>$katalog, 'katalog2'=>$katalog2]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, $id)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            //Ukuran
            $uk = null;
            if(!empty($request->ukuran))
            {
                $uk = implode(", ", $request->ukuran);
            }
            else{
                $uk = " - ";
            }

            //Foto
            $message = [
                'mimes' => 'File Foto Harus Format jpg/jpeg/png',
            ];
            $this->validate($request, [
                'foto' => 'required|mimes:jpg,jpeg,png'
            ],$message);
            $resource = $request->file('foto');
            $path = '/Foto_Produk/'.time().'-'.$resource->getClientOriginalName();
            $resource->move(public_path('Foto_Produk'), $path);
            DB::table('produk')->insert([
                'id_kategori' => $request->kategori,
                'nama_produk' => $request->nama,
                'tgl_produk' => $request->tanggal,
                'harga_produk' => $request->harga,
                'stok_produk' => $request->stok,
                'ukuran_produk' => $uk,
                //dd('ukuran')->exit,
                'keterangan_produk' => $request->keterangan,
                'status_produk' => $request->status,
                'foto_produk' => $path
            ]);
            Session::flash('insert','Data Berhasil di Masukkan');
            return back();
        }

    }

    public function edit(Request $request, $id)
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            //Foto
            $message = [
                'mimes' => 'File Foto Harus Format jpg/jpeg/png',
            ];

            $request->validate ([
                'foto' => 'mimes:jpg,jpeg,png',
            ],$message);

            $path = null;
            if($request->foto)
            {
                $path = '/Foto_Produk/'.time().'-'.$request->foto->getClientOriginalName();
                $request->foto->move(public_path('Foto_Produk'), $path);       
            }   
            else{
                $path = $request->foto2;
            }

            //Ukuran
            $uk = null;
            if(!empty($request->ukuran))
            {
                $uk = implode(", ", $request->ukuran);
            }
            else{
                $uk = " - ";
            }
            DB::table('produk')->where('id_produk',$id)->update([
                'id_kategori' => $request->kategori,
                'nama_produk' => $request->nama,
                'harga_produk' => $request->harga,
                'stok_produk' => $request->stok,
                'ukuran_produk' => $uk,
                'keterangan_produk' => $request->keterangan,
                'status_produk' => $request->status,
                'foto_produk' => $path
            ]);
            Session::flash('edit','Data Berhasil di Edit');
            return back(); 
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
