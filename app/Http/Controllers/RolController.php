<?php

namespace App\Http\Controllers;
use  App\Http\Requests\RolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
       
        $per_page = $request->per_page;
        $filtro = $request->filtro;
        $busquedad = $request->busquedad;
        $rol = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {

            $rol = Rol::orderBy('id', 'desc')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $rol = Rol::where($filtro, '=', $busquedad)->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {

            $rol = Rol::where($filtro, 'LIKE', '%' . $busquedad . '%')->orderBy('id', 'desc')->paginate($per_page);
        }

        return ['rol' => $rol];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $request)
    {
        
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->slug = $request->slug;
        $rol->save();

    }

    public function editar(RolRequest  $request)
    {
        $rol =  Rol::findOrFail($request->id);
        $rol->nombre = $request->nombre;
        $rol->slug = $request->slug;
        $rol->update();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol =  Rol::findOrFail($id);
        return ['rol' => $rol];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rol = Rol::findOrFail($id);
        $rol->estado =  !$rol->estado;
        $rol->update();
    }
}
