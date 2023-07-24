<?php

namespace App\Repositories;

use App\Models\Interaccion;
use Exception;
use Illuminate\Http\Response;

class InteraccionRepository{
    public function guardarInteraccion($request)
    {
        try {
            $interaccion = new Interaccion();
            $solicitud = $this->agregarInteraccion($request, $interaccion);

            return response()->json(["interaccion" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    // public function listarInteraccion()
    // {
    //     $interaccion = Interaccion::all();
    //     return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
    // }

    public function listarInteraccion($request)
    {
        try {
            $solicitud = Interaccion::where('perro_interesado_id', $request->perro_interesado_id)->get();
            if(!$solicitud){
                return response()->json(["error"], Response::HTTP_BAD_REQUEST);
            }
            return response()->json(["interaccion" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    // public function actualizarPerro($request)
    // {
    //     try {
    //         $solicitud = Perro::find($request->id);
    //         if(!$solicitud){
    //             return response()->json(["error"], Response::HTTP_BAD_REQUEST);
    //         }
    //         $this->agregarPerro($request, $solicitud);
    //         return response()->json(["perro" => $solicitud], Response::HTTP_OK);
    //     } catch (Exception $e) {
    //         return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    //     }
        
    // }

    // public function eliminarPerro($request)
    // {
    //     try {
    //         $solicitud = Perro::find($request->id);
    //         if(!$solicitud){
    //             return response()->json(["error"], Response::HTTP_BAD_REQUEST);
    //         }
    //        $solicitud->delete();
    //         return response()->json(["perro" => $solicitud], Response::HTTP_OK);
    //     } catch (Exception $e) {
    //         return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    //     }
        
    // }

    protected function agregarInteraccion($data, Interaccion $interaccion)
    {
        $interaccion->perro_interesado_id = $data->perro_interesado_id ?? $interaccion->perro_interesado_id;
        $interaccion->perro_candidato_id = $data->perro_candidato_id ?? $interaccion->perro_candidato_id;
        $interaccion->preferencia = $data->preferencia ?? $interaccion->preferencia;
        $interaccion->save();
        return $interaccion;
    }
}