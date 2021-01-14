<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller_penjualan extends Controller
{
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $penjualan = DB::table('penjualan')->orderby('id_penjualan', 'asc')->get();
            $detail_penjualan = DB::table('detail_penjualan')->get();
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            return view('/transaksi/penjualan', ['penjualan' => $penjualan, 'detail_penjualan' => $detail_penjualan, 'katalog'=>$katalog]);
        }
    }
}
