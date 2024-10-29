<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class timesController extends Controller
{
    public function index()
    {
        $times = Time::with('treinador')->get();
        return response()->json($times);
    }

    public function store(Request $request)
    {
        $request->validate([
            'treinador_id' => 'required|exists:treinador,id',
            'nome' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $time = Time::create($request->all());
        return response()->json($time, 201);
    }

    public function show($id)
    {
        $time = Time::with('treinador')->findOrFail($id);
        return response()->json($time);
    }

    public function update(Request $request, $id)
    {
        $time = Time::findOrFail($id);
        $request->validate([
            'treinador_id' => 'required|exists:treinador,id',
            'nome' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $time->update($request->all());
        return response()->json($time);
    }

    public function destroy($id)
    {
        Time::destroy($id);
        return response()->json(null, 204);
    }
    public function times()
    {
        return view('times');
    }
}
