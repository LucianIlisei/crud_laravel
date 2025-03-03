<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_comienzo' => 'required|date',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('mensaje', 'El proyecto ha sido creado correctamente.');
    }

    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function show(Proyecto $proyecto)
    {
    return view('proyectos.show', compact('proyecto'));
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([    
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_comienzo' => 'required|date',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')->with('mensaje', 'El proyecto ha sido actualizado con éxito.');
    }

    public function destroy(Proyecto $proyecto)
    {
    $proyecto->delete();

    return redirect()->route('proyectos.index')->with('mensaje', 'El proyecto ha sido eliminado correctamente.');
    }

}
