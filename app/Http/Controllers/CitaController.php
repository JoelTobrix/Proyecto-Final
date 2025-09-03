<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita; // Asegúrate de importar el modelo Cita

class CitaController extends Controller
{
    /**
     * Muestra el formulario para agendar una cita.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retorna la vista con el formulario para agendar citas
        return view('citas.create');
    }

    /**
     * Almacena una nueva cita en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        // Creación y almacenamiento de la cita
        Cita::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

       
        return redirect()->back()->with('success', 'Cita agendada correctamente.');
    }
}
