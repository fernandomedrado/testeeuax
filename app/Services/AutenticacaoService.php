<?php 

namespace App\Services;

use App\Http\Requests\LoginRequest;

class AutenticacaoService {

    public function addUsuarioLogado(LoginRequest $usuario)
    {
        session(['usuario' => $usuario]);
    }

    public function getUsuarioLogado()
    {
        return session('usuario');
    }

    public function invalidar($request)
    {
        $request->session()->invalidate();
    }

}
