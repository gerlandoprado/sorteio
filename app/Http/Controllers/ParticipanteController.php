<?php

namespace App\Http\Controllers;

use App\Models\Participante; 
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $participantes = Participante::all();
        if ($request->cookie('participante_cadastrado') !== 'Gerlando Lima Prado') {
            return redirect('/')->with('error', 'Acesso negado. Você não tem permissão.');
        }

        return view('participantes.index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nome' => 'required']);
        Participante::create(['nome' => $request->nome]);
        return redirect()->route('participantes.index');
    }

    public function storeUpdate(Request $request)
    {
        $request->validate(['nome' => 'required']);
        Participante::create(['nome' => $request->nome]);
        $cookie = cookie('participante_cadastrado', $request->nome, 1440); 
        return redirect()->back()->withCookie($cookie);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $participante = Participante::findOrFail($id);
        return view('participantes.edit', compact('participante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nome' => 'required',
        ]);

        $participante = Participante::findOrFail($id);

        $participante->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('participantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {       
        $participante = Participante::findOrFail($id);
        $participante->delete();
        return redirect()->route('participantes.index');
    }

    public function sortear()
    {
        $vencedor = Participante::inRandomOrder()->first();
        $participantes = Participante::all();
        return view('participantes.sortear', compact('vencedor', 'participantes'));
    }

    public function home()
    {
        $participantes = Participante::all();
        return view('home', compact('participantes'));
    }
}
