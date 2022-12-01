<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.eventos.index",["eventos" => Evento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.eventos.create",["clientes" =>Cliente::all(),"equipos" => Equipo::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nombre" => "required|string",
            "fecha" => "required|date",
            "cliente_id" => "required|exists:clientes,id",
            "equipo_id" => "required|exists:equipos,id",
        ]);

        Evento::create($validated);
        return redirect()->route("eventos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view("pages.eventos.edit",["evento" => $evento,"clientes" => Cliente::all(), "equipos" =>Equipo::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            "nombre" => "required|string",
            "fecha" => "required|date",
            "cliente_id" => "required|exists:clientes,id",
            "equipo_id" => "required|exists:equipos,id",
        ]);

        $evento->update($validated);
        $evento->save();
        return redirect()->route("eventos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route("eventos.index");
    }
}
