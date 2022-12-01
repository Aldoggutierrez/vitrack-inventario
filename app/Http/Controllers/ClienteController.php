<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.clientes.index",["clientes" => Cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.clientes.create");
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
            "apellido" => "required|string",
            "fecha_nacimiento" => "required|date",
            "telefono" => "required|numeric",
        ]);

        Cliente::create($validated);
        return redirect()->route("clientes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("pages.clientes.edit",["cliente" => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            "nombre" => "required|string",
            "apellido" => "required|string",
            "fecha_nacimiento" => "required|date",
            "telefono" => "required|numeric",
        ]);

        $cliente->update($validated);
        $cliente->save();
        return redirect()->route("clientes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->eventos) {
            foreach ($cliente->eventos  as $evento) {
                $evento->delete();
            }
        }
        $cliente->delete();
        return redirect()->route("clientes.index");
    }
}
