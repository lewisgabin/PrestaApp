<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ruta;
use App\Http\Requests\RutaRequest;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page;
        $filtro = $request->filtro;
        $busquedad = $request->busquedad;
        $rutas = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {

            $rutas = Ruta::orderBy('id', 'desc')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $rutas = Ruta::where($filtro, '=', $busquedad)->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {

            $rutas = Ruta::where($filtro, 'LIKE', '%' . $busquedad . '%')->orderBy('id', 'desc')->paginate($per_page);
        }

        return ['rutas' => $rutas];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RutaRequest $request)
    {
        $ruta = new Ruta();
        $ruta->nombre = $request->nombre;
        $ruta->estado = 1;
        $ruta->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::findOrFail($id);
        return ['ruta' => $ruta];
    }

    //EDITAR LA RUTA QUE SE PROPORCIONE EN LA BBDD
    public function editar(RutaRequest $request){
        $ruta = Ruta::findOrFail($request->id);
        $ruta->nombre = $request->nombre;
        $ruta->update();
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
        $ruta = Ruta::findOrFail($id);
        $ruta->estado =  !$ruta->estado;
        $ruta->update();
    }
}
