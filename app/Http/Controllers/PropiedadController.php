<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    // Mostrar formulario y listado principal
    public function index()
    {
        $propiedades = Propiedad::all(); // Trae todas las propiedades
        return view('inmobiliaria', compact('propiedades'));
    }

    // Guardar propiedad nueva
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado' => 'required|string|in:disponible,reservada',
        ]);

        $disponible = ($request->estado === 'disponible') ? 1 : 0;

        // Guardar imagen en storage/app/public/propiedades
        $imagenPath = $request->file('imagen')->store('propiedades', 'public');

        Propiedad::create([
            'titulo' => $request->titulo,
            'ubicacion' => $request->ubicacion,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
            'estado' => $request->estado,
            'disponible' => $disponible
        ]);

        return redirect()->back()->with('success', 'Propiedad creada correctamente');
    }

    // Editar propiedad
    public function editar($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        return view('propiedades.editar', compact('propiedad'));
    }

    // Actualizar propiedad
    public function actualizar(Request $request, $id)
    {
        $propiedad = Propiedad::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado' => 'required|string|in:disponible,reservada',
        ]);

        $disponible = ($request->estado === 'disponible') ? 1 : 0;

        // Actualizar imagen si se sube
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('propiedades', 'public');
            $propiedad->imagen = $imagenPath;
        }

        $propiedad->update([
            'titulo' => $request->titulo,
            'ubicacion' => $request->ubicacion,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'disponible' => $disponible
        ]);

        return redirect()->route('propiedades.index')->with('success', 'Propiedad actualizada correctamente');
    }

    // Eliminar propiedad
    public function eliminar($id)
    {
        $prop = Propiedad::findOrFail($id);
        $prop->delete();

        return redirect()->route('propiedades.index')->with('success', 'Propiedad eliminada correctamente');
    }

    //Administrar propiedades (solo tabla para cargar via fetch)
    
    public function administrar()
   {
    $propiedades = Propiedad::all();
    return view('propiedades.tabla', compact('propiedades'));
   }

}
