<?php

namespace App\Repositories;

use App\Models\Perro;
use Exception;
use Illuminate\Http\Response;

class PerroRepository{
    public function guardarPerro($request)
    {
        try {
            $perro = new Perro();
            $solicitud = $this->agregarPerro($request, $perro);

            return response()->json(["perro" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarPerro()
    {
        $perro = Perro::all();
        return response()->json(["perro" => $perro], Response::HTTP_OK);
    }

    public function actualizarPerro($request)
    {
        try {
            $solicitud = Perro::find($request->id);
            if(!$solicitud){
                return response()->json(["error"], Response::HTTP_BAD_REQUEST);
            }
            $this->agregarPerro($request, $solicitud);
            return response()->json(["perro" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    public function eliminarPerro($request)
    {
        try {
            $solicitud = Perro::find($request->id);
            if(!$solicitud){
                return response()->json(["error"], Response::HTTP_BAD_REQUEST);
            }
           $solicitud->delete();
            return response()->json(["perro" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    protected function agregarPerro($data, Perro $perro)
    {
        $perro->nombre = $data->nombre ?? $perro->nombre;
        $perro->url = $data->url ?? $perro->url;
        $perro->descripcion = $data->descripcion ?? $perro->descripcion;
        $perro->save();
        return $perro;
    }
}

