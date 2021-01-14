<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class Controller_backend extends Controller
{
    public function index()
    {
        if(!Session::get('/login')){
            return redirect('/login');
        }
        else{
            $katalog = DB::table('katalog')->orderby('id_katalog', 'asc')->get();
            return view ('/backend/body', ['katalog'=>$katalog]);
        }
    }
}
