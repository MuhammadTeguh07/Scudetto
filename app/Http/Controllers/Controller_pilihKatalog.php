<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pilihKatalog extends Controller
{
    public function index($id)
    {
        $produk = DB::table('produk')
        ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
        ->join('katalog', 'katalog.id_katalog', '=', 'kategori.id_katalog')
        ->get();
        $katalog2 = DB::table('katalog')->where('id_katalog', $id)->get();
        $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
        return view('/frontend2/pilihKatalog', ['produk' => $produk, 'katalog2' => $katalog2, 'katalog' => $katalog]);
    }
    
}
