<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
 
class Controller_pos extends Controller
{
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $produk = DB::table('produk')->orderby('id_produk', 'asc')->get();
            $user = DB::table('user')->orderby('id_user', 'asc')->get();
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            return view('/transaksi/pos', ['produk' => $produk, 'user' => $user, 'katalog'=>$katalog]);
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
}
