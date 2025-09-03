<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;


class CitaController extends Controller
{
    /**
     * Mostrar todas las citas pendientes en inmobiliaria.blade.php
     */
    public function index()
    {
        $citas = Cita::all(); // Trae todas las citas
        return view('inmobiliaria', compact('citas')); //  Envía $citas a la vista
    }

    /**
     * Muestra el formulario para agendar una cita.
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Almacena una nueva cita en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            
        ]);

        Cita::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'propiedad_id' => $request->propiedad_id, // si tu formulario lo envía
        ]);

        return redirect()->back()->with('success', 'Cita agendada correctamente.');
    }
    //Aceptar cita
    public function aceptar($id)
    {
        $cita=  Cita::findOrFail($id);
        $cita->estado='aceptada';
        $cita->save();

         return redirect()->back()->with('success', 'Cita aceptada .');
    }
    //Rechazar cita
    public function rechazar($id)
    {
        $cita= Cita::findOrFail($id);
        $cita->estado = 'rechazada';
        $cita->save();

         return redirect()->back()->with('success', 'Cita rechazada .');
    }
}
?>