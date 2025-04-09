<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function crear()
    {
        $compte = Compte::create();
        return response()->json($compte);
    }

    public function ingressar(Request $request, $id)
    {
        $compte = Compte::findOrFail($id);
        if ($compte->ingressar($request->quantitat)) {
            return response()->json($compte);
        }
        return response()->json(['error' => 'Operación no válida'], 400);
    }

    public function retirar(Request $request, $id)
    {
        $compte = Compte::findOrFail($id);
        if ($compte->retirar($request->quantitat)) {
            return response()->json($compte);
        }
        return response()->json(['error' => 'Operación no válida'], 400);
    }

    public function transferir(Request $request, $id)
    {
        $compte = Compte::findOrFail($id);
        $destinatari = Compte::findOrFail($request->destinatari_id);
        if ($compte->transferir($destinatari, $request->quantitat)) {
            return response()->json(['origen' => $compte, 'destinatari' => $destinatari]);
        }
        return response()->json(['error' => 'Operación no válida'], 400);
    }
}
