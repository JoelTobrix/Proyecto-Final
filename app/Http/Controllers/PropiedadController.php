<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    // Mostrar listado principal
    public function index()
    {
        $propiedades = Propiedad::all();
        $reservadas = Propiedad::where('estado', 'reservada')->get();
        return view('inmobiliaria', compact('propiedades', 'reservadas'));

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

        return redirect()->back()->with('success', '');
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

    // 👇 Redirigimos al CRUD en vez de al index
    return redirect()->route('propiedades.administrar')
                     ->with('success', 'Propiedad actualizada correctamente');
}

// Eliminar propiedad
public function eliminar($id)
{
    $prop = Propiedad::findOrFail($id);
    $prop->delete();

    //  redirigir al CRUD
    return redirect()->route('propiedades.administrar')
                     ->with('success', 'Propiedad eliminada correctamente');
}


    // Tabla para administrar propiedades
    public function administrar()
    {
        $propiedades = Propiedad::all();
        return view('propiedades.tabla', compact('propiedades'));
    }
    public function reservadas()
{
    // Propiedades con cita aceptada
    $reservadas = Propiedad::whereHas('citas', function($query){
        $query->where('estado', 'aceptada');
    })->with('citas')->get(); // Incluye citas para poder mostrar info si quieres 

    return view('propiedades.reservadas', compact('reservadas'));
}
    public function ver()
    {
      $propiedades = Propiedad::all();
      return view('propiedades.ver', compact('propiedades'));
    }



    public function busqueda(Request $request)
    {
          $query = Propiedad::query();

    // Filtrar por título
    if ($request->filled('titulo')) {
        $query->where('titulo', 'like', '%' . $request->titulo . '%');
    }

    // Filtrar por ubicación
    if ($request->filled('ubicacion')) {
        $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
    }

    // Filtrar por precio mínimo
    if ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }

    // Filtrar por precio máximo
    if ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }

    // Filtrar por estado (disponible o reservada)
    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    $propiedades = $query->get();

    return view('propiedades.busqueda', compact('propiedades'));
    }


   public function detalles($id)
   {
    $propiedad = Propiedad::find($id);

    if (!$propiedad) {
        return redirect()->back()->with('error', 'Propiedad no encontrada');
    }
    return view('propiedades.detalles', compact('propiedad'));
   }
   
   public function reporteDemanda()
   {
     $demanda = \DB::table('propiedades')
        ->select('ubicacion', \DB::raw('COUNT(*) as total'))
        ->groupBy('ubicacion')
        ->orderByDesc('total')
        ->get();

    return $demanda;
   }
}


