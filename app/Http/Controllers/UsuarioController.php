<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Rol;
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
        $per_page = $request->per_page;
        $filtro = $request->filtro;
        $busquedad = $request->busquedad;
        $usuarios = "";

        //Si no hay un criterio establecido ni se ha aplicado algun filtro
        if ($filtro == '' ||  $busquedad == '') {

            $usuarios = Usuario::orderBy('id', 'desc')->paginate($per_page);
        }
        //Si se desea filtrar por los registros activos, sin importar que el criterio este lleno o vacio
        if ($filtro == 'estado') {
            $usuarios = Usuario::where($filtro, '=', $busquedad)->orderBy('id', 'desc')->paginate($per_page);
        }
        // Busquedad por nombre
        if (strlen($filtro) >= 1 || strlen($busquedad) >= 1) {

            $usuarios = Usuario::where($filtro, 'LIKE', '%' . $busquedad . '%')->orderBy('id', 'desc')->paginate($per_page);
        }

        return ['usuarios' => $usuarios];
    }
    
  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file;
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = 1;
        $usuario->rol = $request->rol;
        $usuario->image = 'sin.png';
        if ($file) {
            $subNombre = Str::random(10);
            $fileName = $file->getClientOriginalName();
            $fileServer = $subNombre . '_' . $fileName;
            Storage::putFileAs('public/img/users', $file, $fileServer);
            $usuario->image = $fileServer;
        }

        //  $usuario->creado_por = 1;
        //  $usuario->actualizado_por = 1;
        $usuario->created_at = now();


        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $usuario =  Usuario::findOrFail($id);
        return ['usuario' => $usuario];
    }

    public function getRol()
    {
        $rol = Rol::select('nombre', 'id')->where('estado', '=', 1)->get();
        return ['rol' => $rol];
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {

     
        $file = $request->file;
        $usuario =  Usuario::findOrFail($request->id);
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        if (!empty($request->password)) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->rol = $request->rol;

        if ($file != "false") {
            $subNombre = Str::random(10);
            $fileName = $file->getClientOriginalName();
            $fileServer = $subNombre . '_' . $fileName;
            Storage::putFileAs('public/img/users', $file, $fileServer);
            $usuario->image = $fileServer;
        }

        $usuario->update();
     
    }




    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario =  Usuario::findOrFail($id);
        $usuario->estado =  !$usuario->estado;
        $usuario->update();
    }
}
