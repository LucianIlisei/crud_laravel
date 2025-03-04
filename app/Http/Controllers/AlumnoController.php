<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use App\Models\Proyecto; // Importamos el modelo de Proyecto
use Illuminate\Support\Facades\Schema;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Schema::getColumnListing("alumnos");
        $exclude = ["created_at", "updated_at"];
        $campos = array_diff($campos, $exclude);
        $filas = Alumno::select($campos)->with('proyecto')->get(); // Incluimos el proyecto asociado

        return view('alumnos.index', compact('filas', "campos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all(); // Obtener todos los proyectos disponibles
        return view('alumnos.create', compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $datos = $request->only(["nombre", "email", "edad", "proyecto_id"]); // Incluir proyecto_id
       
        // Validar que el proyecto existe antes de asignarlo
        if ($datos["proyecto_id"] && !Proyecto::find($datos["proyecto_id"])) {
            return redirect()->back()->withErrors(['proyecto_id' => 'El proyecto seleccionado no existe.']);
        }

        $alumno = new Alumno($datos);
        $alumno->save();

        // Guardar idiomas si existen
        if ($request->has("idiomas")) {
            $idiomas = collect($request->input('idiomas'));
            $idiomas->each(fn($idioma) => $alumno->idiomas()->create([
                "idioma" => $idioma,
                "nivel" => $request->input("nivel")[$idioma] ?? null,
                "titulo" => $request->input("titulo")[$idioma] ?? null,
            ]));
        }

        session()->flash('mensaje', 'Alumno creado con éxito.');
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
    $alumno->load('proyecto'); // Cargar la relación del proyecto
    return view('alumnos.show', compact('alumno'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        $proyectos = Proyecto::all(); // Obtener todos los proyectos para el select
        return view('alumnos.edit', compact('alumno', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $datos = $request->only(["nombre", "email", "edad", "proyecto_id"]); // Incluir proyecto_id

        // Validar que el proyecto existe antes de asignarlo
        if ($datos["proyecto_id"] && !Proyecto::find($datos["proyecto_id"])) {
            return redirect()->back()->withErrors(['proyecto_id' => 'El proyecto seleccionado no existe.']);
        }

        $alumno->update($datos);

        // Eliminar los idiomas actuales del alumno
        $alumno->idiomas()->delete();

        // Volver a crearlos con los datos actualizados
        if ($request->has("idiomas")) {
            collect($request->input("idiomas"))->each(fn($idioma) =>
                $alumno->idiomas()->create([
                    "idioma" => $idioma,
                    "nivel" => $request->input("niveles")[$idioma] ?? null,
                    "titulo" => $request->input("titulos")[$idioma] ?? null
                ])
            );
        }

        session()->flash("mensaje", "Alumno actualizado con éxito.");
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash('mensaje', 'Alumno eliminado con éxito.');
        return redirect()->route('alumnos.index');
    }
}
