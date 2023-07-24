<?php

namespace App\Http\Controllers;

use App\Repositories\PerroRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PerroRequest;


class PerroController extends Controller
{
    protected PerroRepository $perroRepo;

    public function __construct(PerroRepository $perroRepo)
    {
        $this->perroRepo = $perroRepo;
    }

    public function guardarPerro(PerroRequest $request)
    {
        return $this->perroRepo->guardarPerro($request);
    }

    public function listarPerro()
    {
        return $this->perroRepo->listarPerro();
    }

    public function actualizarPerro(PerroRequest $request)
    {
        return $this->perroRepo->actualizarPerro($request);
    }

    public function eliminarPerro(Request $request)
    {
        return $this->perroRepo->eliminarPerro($request);
    }


}