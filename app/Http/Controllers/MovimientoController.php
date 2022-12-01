<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Movimiento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.movimientos.index",["movimientos" => Movimiento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.movimientos.create",["ubicaciones" => Ubicacion::all(),"equipos" => Equipo::all()]);
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
            "equipo_id" => "required|exists:equipos,id",
            "ubicacion_id" => "required|exists:ubicacions,id"
        ]);

        $equipo = Equipo::find($request->equipo_id);

        $equipo->update([
            "ubicacion_id" => $request->ubicacion_id
        ]);

        Movimiento::create([
            ...$validated,
            "fecha" => now()->toDate(),
            "hora" => now('America/Monterrey')->toTimeString('minute')
        ]);

        return redirect()->route("movimientos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento)
    {
        return view("pages.movimientos.edit",["movmiento" => $movimiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $validated = $request->validate([
            "equipo_id" => "required|exists:equipos,id",
            "ubicacion_id" => "required|exists:ubicacions,id"
        ]);

        $movimiento->update($validated);
        $movimiento->save();
        return redirect()->route("movimientos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return redirect()->route("movimientos.index");
    }
}
