<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::with('time')->get();
        return response()->json($jogadores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_id' => 'required|exists:times,id',
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'required|date',
            'posicao' => 'required|string|max:100',
        ]);

        $jogador = Jogador::create($request->all());
        return response()->json($jogador, 201);
    }

    public function show($id)
    {
        $jogador = Jogador::with('time')->findOrFail($id);
        return response()->json($jogador);
    }

    public function update(Request $request, $id)
    {
        $jogador = Jogador::findOrFail($id);
        $request->validate([
            'time_id' => 'required|exists:times,id',
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'required|date',
            'posicao' => 'required|string|max:100',
        ]);

        $jogador->update($request->all());
        return response()->json($jogador);
    }

    public function destroy($id)
    {
        Jogador::destroy($id);
        return response()->json(null, 204);
    }
    public function jogador()
    {
        return view('jogador');
    }
}
