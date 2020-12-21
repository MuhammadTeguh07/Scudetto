<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_pos extends Controller
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
            $produk = DB::table('produk')->orderby('id_produk', 'asc')->get();
            $user = DB::table('user')->orderby('id_user', 'asc')->get();
            return view('/transaksi/pos', ['produk' => $produk, 'user' => $user]);
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
            DB::table('penjualan')->insert([
                'id_user' => $request->user,
                'tgl_penjualan' =>$request->tanggal,
                'total_pembayaran'=> $request->total_pembayaran
            ]);
            $id_penjualan = DB::table('penjualan')->max('id_penjualan');
            foreach ($request['id'] as $key) {
                DB::table('detail_penjualan')->insert([
                    'id_penjualan'   => $id_penjualan,
                    'id_produk'  => $key,
                    'jumlah_produk' => $request['qty'][$key],
                    'harga_jual_produk'=> $request['harga'][$key],
                    'diskon_produk'=> $request['diskon'][$key],
                    'total_harga_produk'=> $request['subtotal'][$key]
                ]);
            }
            Session::flash('insert','Transaksi Berhasil');
            return redirect('/pos');
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
