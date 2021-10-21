<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
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
        $sectores = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {
            $sectores = Sector::orderBy('id', 'desc')->with('municipio.provincia')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $sectores = Sector::where($filtro, '=', $busquedad)->with('municipio.provincia')->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {
            $sectores = Sector::where($filtro, 'LIKE', '%' . $busquedad . '%')->with('municipio.provincia')->orderBy('id', 'desc')->paginate($per_page);
        }
        
        return ['sectores' => $sectores];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $sector = new Sector();
            $sector->nombre = $request->nombre;
            $sector->id_municipio = $request->municipio;
            $sector->estado = 1;
            $sector->save();

            DB::commit();
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::findOrFail($id);
        $municipio = Municipio::findOrFail($sector->id_municipio);
        $provincia = Provincia::findOrFail($municipio->id_provincia);
        
        return ['sector' => $sector, 'provincia' => $provincia, 'municipio' => $municipio];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request){
        try{
            DB::beginTransaction();

            $sector = Sector::findOrFail($request->id);
            $sector->nombre = $request->nombre;
            $sector->id_municipio = $request->municipio;
            $sector->estado = 1;
            $sector->update();

            DB::commit();
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
        }
    }

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
        $sector = Sector::findOrFail($id);
        $sector->estado = !$sector->estado;
        $sector->update();
    }
}
