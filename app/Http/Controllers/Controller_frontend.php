<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_frontend extends Controller
{
    public function index()
    {
        $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
        return view('/frontend/body', ['katalog' => $katalog]);
    }

}
