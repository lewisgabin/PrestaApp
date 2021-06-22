<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;
use App\Http\Requests\PermisoRequest;

class PermisoController extends Controller
{
    public function index( Request $request)
    {
        //
       
        $per_page = $request->per_page;
        $filtro = $request->filtro;
        $busquedad = $request->busquedad;
        $permiso = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {

            $permiso = Permiso::orderBy('id', 'desc')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $permiso = Permiso::where($filtro, '=', $busquedad)->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {

            $permiso = Permiso::where($filtro, 'LIKE', '%' . $busquedad . '%')->orderBy('id', 'desc')->paginate($per_page);
        }

        return ['permiso' => $permiso];
    }

    
    public function store(PermisoRequest $request)
    {
        
        $permiso = new Permiso();
        $permiso->nombre = $request->nombre;
        $permiso->modulo = $request->modulo;
        $permiso->slug = $request->slug;
        $permiso->estado = 1;
        $permiso->save();

    }

    public function editar(PermisoRequest  $request)
    {
        $permiso =  Permiso::findOrFail($request->id);
        $permiso->nombre = $request->nombre;
        $permiso->modulo = $request->modulo;
        $permiso->slug = $request->slug;
        $permiso->update();

    }


    public function show($id)
    {
        $permiso =  Permiso::findOrFail($id);
        return ['permiso' => $permiso];
    }

    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {
        //
        $permiso = Permiso::findOrFail($id);
        $permiso->estado =  !$permiso->estado;
        $permiso->update();
    }
}
