<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class partidasController extends Controller
{
    public function index()
    {
        $partidas = Partida::all();
        return response()->json($partidas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_casa_id' => 'required|exists:times,id',
            'time_fora_id' => 'required|exists:times,id',
            'data_jogo' => 'required|date',
            'local' => 'required|string|max:255',
            'placar_jogo' => 'nullable|string',
        ]);

        $partida = Partida::create($request->all());
        return response()->json($partida, 201);
    }

    public function show($id)
    {
        $partida = Partida::findOrFail($id);
        return response()->json($partida);
    }

    public function update(Request $request, $id)
    {
        $partida = Partida::findOrFail($id);
        $request->validate([
            'time_casa_id' => 'required|exists:times,id',
            'time_fora_id' => 'required|exists:times,id',
            'data_jogo' => 'required|date',
            'local' => 'required|string|max:255',
            'placar_jogo' => 'nullable|string',
        ]);
        
        $partida->update($request->all());
        return response()->json($partida);
    }

    public function destroy($id)
    {
        Partida::destroy($id);
        return response()->json(null, 204);
    }
    public function partidas()
    {
        return view('partidas');
    }
}
