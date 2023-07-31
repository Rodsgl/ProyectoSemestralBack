<?php

namespace App\Repositories;

use App\Models\Bebida;
use Exception;
use Illuminate\Http\Response;

class BebidaRepository{
    public function guardarBebida($request)
    {
        try {
            $bebida = new Bebida();
            $solicitud = $this->agregarBebida($request, $bebida);

            return response()->json(["bebida" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listarBebida()
    {
        $bebida = Bebida::all();
        return response()->json(["bebida" => $bebida], Response::HTTP_OK);
    }

    public function actualizarBebida($request)
    {
        try {
            $solicitud = Bebida::find($request->id);
            if(!$solicitud){
                return response()->json(["error"], Response::HTTP_BAD_REQUEST);
            }
            $this->agregarBebida($request, $solicitud);
            return response()->json(["bebida" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    public function eliminarBebida($request)
    {
        try {
            $solicitud = Bebida::find($request->id);
            if(!$solicitud){
                return response()->json(["error"], Response::HTTP_BAD_REQUEST);
            }
           $solicitud->delete();
            return response()->json(["bebida" => $solicitud], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    protected function agregarBebida($data, Bebida $bebida)
    {
        $bebida->nombre = $data->nombre ?? $bebida->nombre;
        $bebida->sabor = $data->sabor ?? $bebida->sabor;
        $bebida->presentacion = $data->presentacion ?? $bebida->presentacion;
        $bebida->cantidad = $data->cantidad ?? $bebida->cantidad;
        $bebida->save();
        return $bebida;
    }
}

