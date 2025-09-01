<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    // 1️⃣ Guardar propiedad nueva
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
            'estado' => 'required|string|in:disponible,reservada',
        ]);

        $disponible = ($request->estado === 'disponible') ? 1 : 0;

        Propiedad::create([
            'titulo' => $request->titulo,
            'ubicacion' => $request->ubicacion,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
            'disponible' => $disponible
        ]);

        return redirect()->back()->with('success', 'Propiedad creada correctamente');
    }

    // 2 Listar propiedades (para CRUD / Administrar)
    public function administrar()
{
    $propiedades = Propiedad::all();
    return view('propiedades.administrar', compact('propiedades'));
}

    // 3 Mostrar formulario de edición
    public function editar($id)
    {
        $prop = Propiedad::findOrFail($id);
        return view('propiedades.editar', compact('prop'));
    }

    // 4 Actualizar propiedad
    public function actualizar(Request $request, $id)
    {
        $prop = Propiedad::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
            'estado' => 'required|string|in:disponible,reservada',
        ]);

        $disponible = ($request->estado === 'disponible') ? 1 : 0;

        $prop->update([
            'titulo' => $request->titulo,
            'ubicacion' => $request->ubicacion,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
            'disponible' => $disponible
        ]);

        return redirect()->route('propiedades.administrar')->with('success', 'Propiedad actualizada correctamente');
    }

    // 5️⃣ Eliminar propiedad
    public function eliminar($id)
    {
        $prop = Propiedad::findOrFail($id);
        $prop->delete();

        return redirect()->route('propiedades.administrar')->with('success', 'Propiedad eliminada correctamente');
    }
}
