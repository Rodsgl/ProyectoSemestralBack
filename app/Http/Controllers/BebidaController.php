<?php

namespace App\Http\Controllers;

use App\Repositories\BebidaRepository;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    protected BebidaRepository $bebidaRepo;

    public function __construct(BebidaRepository $bebidaRepo)
    {
        $this->bebidaRepo = $bebidaRepo;
    }

    public function guardarBebida(Request $request)
    {
        return $this->bebidaRepo->guardarBebida($request);
    }
    public function listarBebida()
    {
        return $this->bebidaRepo->listarBebida();
    }
    public function actualizarBebida(Request $request)
    {
        return $this->bebidaRepo->actualizarBebida($request);
    }
    public function eliminarBebida(Request $request)
    {
        return $this->bebidaRepo->eliminarBebida($request);
    }
}
