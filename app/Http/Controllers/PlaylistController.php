<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\JsonResponse;
class PlaylistController extends Controller
{
    public function CrearPlaylist(Request $request): JsonResponse{
        DB::statement('CALL CrearPlaylist(?, ?, ?)', [
            $request->id_usuario,
            $request->nombre,
            $request->privacidad
        ]);

        return response()->json(['mensaje' => 'Playlist creada correctamente']);
    }

    public function ObtenerPlaylists(): JsonResponse{
        $playlists = DB::select('CALL ObtenerPlaylists()');
        return response()->json($playlists);
    }

    public function ObtenerPlaylistsPorUsuario($id_usuario): JsonResponse{
        $playlists = DB::select('CALL ObtenerPlaylistsPorUsuario(?)', [$id_usuario]);
        return response()->json($playlists);
    }
}
