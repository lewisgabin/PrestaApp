<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class PrestamosCrontroller extends Controller
{
    public function listClientes(){

        $cliente= Cliente::select('id','nombre')->get();
      

        return ["data" => $cliente] ;
    }

    public function guardar(Request $request){
            dd($request->all());
    }
}
