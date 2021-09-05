<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;

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
    public function store(Request $request)
    {
        $file = $request->file;
        $cliente = new Cliente();
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
