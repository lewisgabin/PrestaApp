<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestamos;
use Illuminate\Support\Facades\DB;

class PrestamosCrontroller extends Controller
{
    public function listClientes(){

        $cliente= Cliente::select('id','nombre')->get();


        return ["data" => $cliente] ;
    }

    public function guardar(Request $request){

      try {
        DB::beginTransaction();





        DB::commit();
      }catch (\Exception $e){
        dd($e);
        DB::rollback();

      }
    }
}
