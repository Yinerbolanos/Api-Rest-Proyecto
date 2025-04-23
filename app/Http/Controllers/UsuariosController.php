<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use DB;
class UsuariosController extends Controller
{
    public function crearUsuario(Request $request)
    {
        DB::statement('CALL CrearUsuario(?, ?, ?, ?)', [
            $request->input('nombre'),
            $request->input('apellido'),
            $request->input('correo'),
            $request->input('contrasena'),
        ]);

        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }

    public function ObtenerUsuarios(){
        $usuarios = DB::select('CALL ObtenerUsuarios()');
        return response()->json($usuarios);

    }

    public function ObtenerUsuarioPorID($id_usuario): JsonResponse {
        $usuarios = DB::select('CALL ObtenerUsuarioPorID(?)', [$id_usuario]);
        return response()->json($usuarios);
    }

    public function ActualizarUsuario(Request $request, $id_usuario): JsonResponse {
        DB::statement('CALL ActualizarUsuario(?, ?, ?, ?, ?)', [
            $id_usuario,
            $request->nombre,
            $request->apellido,
            $request->correo,
            bcrypt($request->contrasena) 
        ]);

        return response()->json(['message' => 'Usuario actualizado correctamente.']);
    }

    public function EliminarUsuario($id_usuario): JsonResponse{
        DB::statement('CALL EliminarUsuario(?)', [$id_usuario]);
        return response()->json(['message' => 'Usuario eliminado correctamente.']);
    }

}
