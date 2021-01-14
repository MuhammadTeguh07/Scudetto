<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pilihProduk extends Controller
{
    public function index($id)
    {
        $produk = DB::table('produk')->where('id_produk', $id)->get();
        $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
        $katalog2 = DB::table('katalog')->where('id_katalog', $id)->get();
        return view('/frontend2/pilihProduk', ['produk'=>$produk, 'katalog'=>$katalog, 'katalog2'=>$katalog2]);
    }
}
