<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.equipos.index',["equipos" => Equipo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.equipos.create',["ubicaciones" => Ubicacion::all()]);
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
            "marca" => "required|string",
            "numero_serie" => "required|alpha_num|unique:equipos,numero_serie",
            "ubicacion_id" => "required|integer|exists:ubicacions,id",
            "fecha_garantia" => "required|date"
        ]);

        Equipo::create($validated);

        return view('pages.equipos.index',["equipos" => Equipo::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view("pages.equipos.edit",["equipo" => $equipo,"ubicaciones" => Ubicacion::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $validated = $request->validate([
            "nombre" => "required|string",
            "marca" => "required|string",
            "numero_serie" => [Rule::unique('equipos')->ignore($equipo->id),"required","alpha_num"],
            "ubicacion_id" => "required|integer|exists:ubicacions,id",
            "fecha_garantia" => "required|date"
        ]);

        $equipo->update($validated);
        $equipo->save();
        return redirect()->route("equipos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return view('pages.equipos.index',["equipos" => Equipo::all()]);
    }
}
