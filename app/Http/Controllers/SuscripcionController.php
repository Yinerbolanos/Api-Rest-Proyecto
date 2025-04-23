<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\JsonResponse;
class SuscripcionController extends Controller{
    public function CrearSuscripcionGratuita($id_usuario){
        DB::statement('CALL CrearSuscripcionGratuita(?)', [$id_usuario]);

        return response()->json(['message' => 'Suscripción gratuita creada correctamente.']);
    }

    public function CrearSuscripcionPremium($id_usuario){
        DB::statement('CALL CrearSuscripcionPremium(?)', [$id_usuario]);
        return response()->json(['message' => 'Suscripción Premium creada correctamente.']);
    }

    public function ObtenerSuscripciones(){
        $suscripciones = DB::select('CALL ObtenerSuscripciones()');
        return response()->json($suscripciones);
    }

    public function ObtenerSuscripcionPorID($id_usuario): JsonResponse{
        $suscripcion = DB::select('CALL ObtenerSuscripcionPorID(?)', [$id_usuario]);
        return response()->json($suscripcion);
    }

    public function ActualizarSuscripcion(Request $request, $id_usuario): JsonResponse{
        DB::statement('CALL ActualizarSuscripcion(?, ?, ?, ?, ?)', [
            $request->id_suscripcion,
            $request->tipo_suscripcion,
            $request->fecha_inicio,
            $request->fecha_fin,
            $request->estado
        ]);

        return response()->json(['mensaje' => 'Suscripción actualizada correctamente.']);
    }

    public function EliminarSuscripcionPorUsuario(Request $request): JsonResponse{
        DB::statement('CALL EliminarSuscripcionPorUsuario(?)', [
            $request->id_usuario
        ]);

        return response()->json(['mensaje' => 'Suscripción eliminada correctamente para el usuario.']);
    }


}
