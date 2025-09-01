<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    // Guardar propiedad nueva
    public function store(Request $request)
    {
        // Validar solo los campos que tienes en el formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
            'estado' => 'required|string|in:disponible,reservada',
        ]);

        // Ajustar valor de 'disponible' según el estado
        $disponible = ($request->estado === 'disponible') ? 1 : 0;

        // Crear propiedad
        Propiedad::create([
            'titulo' => $request->titulo,
            'ubicacion' => $request->ubicacion,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'estado' => $request->estado,
            'disponible' => $disponible
        ]);

        // Redirigir de vuelta a la misma página con mensaje de éxito
        return redirect()->back()->with('success', 'Propiedad creada correctamente');
    }
}
