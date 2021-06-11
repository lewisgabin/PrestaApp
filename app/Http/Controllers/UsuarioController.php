<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        $filtro = $request->filtro;
        $busquedad = $request->busquedad;
       $usuarios = "";
     
        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if($filtro == '' ||  $busquedad == ''){
           
            $usuarios = Usuario::orderBy('id','desc')->get();            
        }        
       //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if($filtro == 'estado'){
            $usuarios = Usuario::where($filtro,'=',$busquedad)->orderBy('id','desc')->get();    
        }
        // Busquedad por nombre
        if(strlen($filtro) >= 1 || strlen($busquedad) >= 1){
          
            $usuarios = Usuario::where($filtro,'LIKE','%'.$busquedad.'%')->orderBy('id','desc')->get(); 
           
        }

        return ['usuarios'=> $usuarios];
    
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
