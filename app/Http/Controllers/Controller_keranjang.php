<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use DB;

class Controller_keranjang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addKeranjang(Request $request, $id)
    {
        $cart = session("cart");
        $cart[$id] = [
            "foto_produk" => $request->foto_produk,
            "nama_produk" => $request->nama_produk,
            "harga_produk" => $request->harga_produk,
            "jumlah_produk" => $request->jumlah_produk,
            "ukuran_produk" => $request->ukuran_produk
        ];

        session(["cart" => $cart]);
        return redirect("/keranjang/".$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function keranjang($id)
    {
        $cart = session("cart");
        $katalog = DB::table("katalog")->get();
        $produk = DB::table("produk")->where("id_produk", $id)->get();
        return view ("/frontend2/keranjang", ["katalog"=>$katalog, "cart"=>$cart, "produk"=>$produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hapusKeranjang($id)
    {
        $cart = session("cart");
        unset($cart[$id]);
        session(["cart" => $cart]);
        return back();

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
