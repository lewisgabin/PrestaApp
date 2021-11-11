<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
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
        $empresas = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {

            $empresas = Empresa::orderBy('id', 'desc')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $empresas = Empresa::where($filtro, '=', $busquedad)->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {

            $empresas = Empresa::where($filtro, 'LIKE', '%' . $busquedad . '%')->orderBy('id', 'desc')->paginate($per_page);
        }

        return ['empresas' => $empresas];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        try {

            DB::beginTransaction();

            $empresa = new Empresa();
            $empresa->nombre = $request->nombre;
            $empresa->rnc = $request->rnc;
            $empresa->telefono = $request->telefono;
            $empresa->telefono2 = $request->telefono2;
            $empresa->direccion = $request->direccion;
            $empresa->eslogan = $request->eslogan;
            $empresa->estado = 1;
            $empresa->created_at = now();
            
            $empresa->save();
            DB::commit();

        } catch (\Throwable $th) {
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
        $empresa = Empresa::findOrFail($id);
        return ['empresa' => $empresa];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(EmpresaRequest $request)
    {
        $empresa = Empresa::findOrFail($request->id_empresa);
        
        $empresa->nombre = $request->nombre;
        $empresa->rnc = $request->rnc;
        $empresa->telefono = $request->telefono;
        $empresa->telefono2 = $request->telefono2;
        $empresa->direccion = $request->direccion;
        $empresa->eslogan = $request->eslogan;
        $empresa->updated_at = now();
        
        $empresa->update();
    }

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
        $empresa =  Empresa::findOrFail($id);
        $empresa->estado =  !$empresa->estado;
        $empresa->update();
    }
}
