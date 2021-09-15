<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Fiador;
use App\Models\Referencias;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente= Cliente::get();
      

        return ["data" =>$cliente] ;
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $idCliente = 0;
        $estado = false;
     
        try{
          
            if($request->estado == "true" && $request->estado2 == "true"){
                $estado = true;
                DB::beginTransaction();
            
                $file = $request->file;
                $cliente = new Cliente();
                $fiador = new Fiador();

                $cliente->foto = 'sin.png';
                $cliente->nombre = $request->nombre;
                $cliente->apellidos = $request->apellidos;
                $cliente->apodo = $request->apodo;
                $cliente->cedula = $request->cedula;
                $cliente->fecha_nacimiento = $request->fecha_nacimiento;
                $cliente->ocupacion = $request->ocupacion;
                $cliente->nacionalidad = $request->nacionalidad;
                $cliente->sexo = $request->sexo;
                $cliente->whatsapp = $request->whatsapp;
                $cliente->tel_principal = $request->tel_principal;
                $cliente->tel_otro = $request->tel_otro;
                $cliente->email = $request->email;
                $cliente->direccion = $request->direccion;
                $cliente->id_provincia = $request->id_provincia;
                $cliente->id_municipio = $request->id_municipio;
                $cliente->sector = $request->sector;
                $cliente->id_ruta = $request->id_ruta;
                $cliente->direccion_trabajo = $request->direccion_trabajo;
                $cliente->recomendado_por = $request->recomendado_por;
                $cliente->comentario = $request->comentario;
                $cliente->estado = 1;
                
                if ($file) {
                    $subNombre = Str::random(10);
                    $fileName = $file->getClientOriginalName();
                    $fileServer = $subNombre . '_' . $fileName;
                    Storage::putFileAs('public/img/clientes', $file, $fileServer);
                    $cliente->foto = $fileServer;
                }

                $cliente->created_at = now();
                $cliente->save();
                $idCliente = $cliente->id;
            
                if($request->F_nombre && $request->F_apellidos && $request->F_cedula && $request->F_telefono){
                    $fiador->nombre = $request->F_nombre;
                    $fiador->apellidos = $request->F_apellidos;
                    $fiador->apodo = $request->F_apodo;
                    $fiador->cedula = $request->F_cedula;
                    $fiador->telefono = $request->F_telefono;
                    $fiador->celular = $request->F_celular;
                    $fiador->direccion = $request->F_direccion;
                    $fiador->id_cliente = $cliente->id;
                    $fiador->created_at = now();
                    $fiador->save();
                }
        
                DB::commit();
            }
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
        
        }

        return['estado' => $estado, 'estado2' => $request->estado2, 'idCliente' => $idCliente];
    }

    public function guardarReferencia(Request $request)
    {
        for ($i = 0; $i < count($request->informacion); $i++) {
            $referencia = new Referencias();

            $referencia->nombre = $request->informacion[$i]['nombre'];
            $referencia->apellidos = $request->informacion[$i]['apellidos'];

            if(isset($request->informacion[$i]['telefono'])){
                $referencia->telefono = $request->informacion[$i]['telefono'];
            }else{
                $referencia->telefono = null;
            }

            if(isset($request->informacion[$i]['direccion'])){
                $referencia->direccion = $request->informacion[$i]['direccion'];
            }else{
                $referencia->direccion = null;
            }

            $referencia->parentesco = $request->informacion[$i]['parentesco'];
            $referencia->idCliente = $request->idCliente;
            $referencia->created_at = now();
            $referencia->save();
        }
    }

    public function editar(ClienteRequest $request)
    {
        $estado = false;
       
        try{
            if($request->estado =="true"){
            DB::beginTransaction();
         
            $file = $request->file;
            $cliente = Cliente::findOrFail($request->id_cliente);
         

            $cliente->foto = 'sin.png';
            $cliente->nombre = $request->nombre;
            $cliente->apellidos = $request->apellidos;
            $cliente->apodo = $request->apodo;
            $cliente->cedula = $request->cedula;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->ocupacion = $request->ocupacion;
            $cliente->nacionalidad = $request->nacionalidad;
            $cliente->sexo = $request->sexo;
            $cliente->whatsapp = $request->whatsapp;
            $cliente->tel_principal = $request->tel_principal;
            $cliente->tel_otro = $request->tel_otro;
            $cliente->email = $request->email;
            $cliente->direccion = $request->direccion;
            $cliente->id_provincia = $request->id_provincia;
            $cliente->id_municipio = $request->id_municipio;
            $cliente->sector = $request->sector;
            $cliente->id_ruta = $request->id_ruta;
            $cliente->direccion_trabajo = $request->direccion_trabajo;
            $cliente->recomendado_por = $request->recomendado_por;
            $cliente->comentario = $request->comentario;
            $cliente->estado = 1;
          //ESTE METODO VALIDA SI TIENE UN ARCHIVO O ES SIMPLEMENTE UN STRING -lewis
            if ($request->hasFile($request->file)) {
                $subNombre = Str::random(10);
                $fileName = $file->getClientOriginalName();
                $fileServer = $subNombre . '_' . $fileName;
                Storage::putFileAs('public/img/clientes', $file, $fileServer);
                $cliente->foto = $fileServer;
            }

            $cliente->updated_at = now();
            $cliente->update();
        
        
            if($request->F_nombre && $request->F_apellidos && $request->F_cedula && $request->F_telefono){
                
                $fiador = Fiador::findOrfail($request->fiador_id);
                $fiador->nombre = $request->F_nombre;
                $fiador->apellidos = $request->F_apellidos;
                $fiador->apodo = $request->F_apodo;
                $fiador->cedula = $request->F_cedula;
                $fiador->telefono = $request->F_telefono;
                $fiador->celular = $request->F_celular;
                $fiador->direccion = $request->F_direccion;
                $fiador->id_cliente = $cliente->id;
                $fiador->updated_at = now();
                $fiador->update();
          

            }
            $estado = true;
            DB::commit();
        } 

        }catch(\Exception $e){
          dd($e);
            DB::rollback();
        
        }

 
        return['estado' => $estado, 'estado2' => $request->estado2, 'idCliente' => $cliente->id];
    }

    public function editarReferencia(Request $request)
    {
        //Se debe recorrer el arreglo de refencias por si se agrego una nueva referencia para guardarla
        for($i = 0; $i < count($request->informacion); $i++){
            if(!isset($request->informacion[$i]['id'])){
                $ref = new Referencias();

                $ref->nombre = $request->informacion[$i]['nombre'];
                $ref->apellidos = $request->informacion[$i]['apellidos'];

                if(isset($request->informacion[$i]['telefono'])){
                    $ref->telefono = $request->informacion[$i]['telefono'];
                }else{
                    $ref->telefono = null;
                }

                if(isset($request->informacion[$i]['direccion'])){
                    $ref->direccion = $request->informacion[$i]['direccion'];
                }else{
                    $ref->direccion = null;
                }

                $ref->parentesco = $request->informacion[$i]['parentesco'];
                $ref->idCliente = $request->idCliente;
                $ref->created_at = now();
                $ref->save();
            }
        }
        
        $listReferencias = DB::select('select * from referencias where idCliente = ?', [$request->idCliente]);
        
        for ($i = 0; $i < count($listReferencias); $i++) {
            $referencias = Referencias::findOrFail($listReferencias[$i]->id);
            $referencias->nombre = $request->informacion[$i]['nombre'];
            $referencias->apellidos = $request->informacion[$i]['apellidos'];

            if(isset($request->informacion[$i]['telefono'])){
                $referencias->telefono = $request->informacion[$i]['telefono'];
            }else{
                $referencias->telefono = null;
            }

            if(isset($request->informacion[$i]['direccion'])){
                $referencias->direccion = $request->informacion[$i]['direccion'];
            }else{
                $referencias->direccion = null;
            }

            $referencias->parentesco = $request->informacion[$i]['parentesco'];
            $referencias->idCliente = $request->idCliente;
            $referencias->updated_at = now();
            $referencias->update();
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
        $cliente =  Cliente::find($id);
        
        return ['cliente' => $cliente, 'provincia' => $cliente->provincia, 'municipio' => $cliente->municipio, 'fiador' => $cliente->fiador, 'referencias' => $cliente->referencia];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

   
    public function getProvincias()
    {
        $provincias = DB::table('provincia')->get();
        
        return ['provincias' => $provincias];
    }

    public function getMunicipios($id)
    {
        $municipios = DB::table('municipio')->where('id_provincia', '=', $id)->get();

        return ['municipios' => $municipios];
    }

    public function destroy($id)
    {
        $usuario =  Cliente::findOrFail($id);
        $usuario->estado =  !$usuario->estado;
        $usuario->update();
    }
}
