<?php

namespace App\Http\Controllers;

use  App\Http\Requests\RolRequest;
use App\Models\Rol;
use App\Models\RolPermiso;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $permisos = $request->permisos;
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->slug = $request->slug;
        $rol->save();

        if (isset($permisos) > 0) {

            foreach ($permisos as $key) {

                if ($key['checked'] == true) {
                    $per = new RolPermiso();
                    $per->id_rol = $rol->id;
                    $per->id_permiso = $key['id'];
                    $per->save();
                }
            }
        }
    }

    public function editar(RolRequest  $request)
    {
        $permisos = $request->permisos;
        $rol =  Rol::findOrFail($request->id);
        $rol->nombre = $request->nombre;
        $rol->slug = $request->slug;
        $rol->update();


        if (isset($permisos) > 0) {
            $delete = RolPermiso::where('id_rol', '=', $request->id);
            $delete->delete();

            foreach ($permisos as $key) {

                if ($key['checked'] == true) {
                    $per = new RolPermiso();
                    $per->id_rol = $rol->id;
                    $per->id_permiso = $key['id'];
                    $per->save();
                }
            }
        }
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
    public function getPermisos()
    {
        $permisos = Permiso::get();
        $modulos = DB::table('permisos')->select('modulo', DB::raw("COUNT(id) as total"))->groupBy('modulo')->get();
        return ['permisos' => $permisos, 'modulos' => $modulos];
    }

    public function getRol($id)
    {

        $rolP = RolPermiso::where('id_rol', '=', $id)->get();
        $rol = Rol::findOrFail($id);

        return ['rolP' => $rolP, 'rol'=>$rol];
    }

    public function destroy($id)
    {
        //
        $rol = Rol::findOrFail($id);
        $rol->estado =  !$rol->estado;
        $rol->update();
    }
}
