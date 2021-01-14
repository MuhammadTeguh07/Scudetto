<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_sepakbola extends Controller
{
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
            return view('/master/sepakbola', ['produk' => $produk, 'kategori' => $kategori]);
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
            $path = '/Foto_SepakBola/'.time().'-'.$resource->getClientOriginalName();
            $resource->move(public_path('Foto_SepakBola'), $path);
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
            Session::flash('insert','Data Berhasil di Masukkan');
            return redirect('/sepakbola');
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
                $path = '/Foto_SepakBola/'.time().'-'.$request->foto->getClientOriginalName();
                $request->foto->move(public_path('Foto_SepakBola'), $path);       
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
            return redirect('/sepakbola'); 
        }
    }

}
