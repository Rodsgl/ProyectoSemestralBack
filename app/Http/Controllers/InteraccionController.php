<?php

namespace App\Http\Controllers;

use App\Repositories\InteraccionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\InteraccionRequest;


class InteraccionController extends Controller
{
    protected InteraccionRepository $interacRepo;

    public function __construct(InteraccionRepository $interacRepo)
    {
        $this->interacRepo = $interacRepo;
    }

    public function guardarInteraccion(InteraccionRequest $request)
    {
        return $this->interacRepo->guardarInteraccion($request);
    }

    public function listarInteraccion(Request $request)
    {
        return $this->interacRepo->listarInteraccion($request);
    }

    // public function actualizarPerro(PerroRequest $request)
    // {
    //     return $this->interacRepo->actualizarPerro($request);
    // }

    // public function eliminarPerro(PerroRequest $request)
    // {
    //     return $this->interacRepo->eliminarPerro($request);
    // }


}