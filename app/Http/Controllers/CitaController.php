<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Propiedad;
use App\Models\Notificacion;
use App\Models\Usuario;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('inmobiliaria', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'propiedad_id' => 'required|exists:propiedades,idPropiedad'
        ]);

        Cita::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'pendiente',
            'propiedad_id' => $request->propiedad_id,
        ]);

        return redirect()->back()->with('success', 'Cita agendada correctamente.');
    }

    public function aceptar($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = 'aceptada';
        $cita->save();

        // ✅ Marcar propiedad como reservada automáticamente
        if($cita->propiedad) {
            $cita->propiedad->estado = 'reservada';
            $cita->propiedad->disponible = 0;
            $cita->propiedad->save();
        }

        $usuario = Usuario::where('correo', $cita->correo)->first();
        if ($usuario) {
            Notificacion::create([
                'usuario_id' => $usuario->idUsuario,
                'mensaje' => "Tu cita para '{$cita->propiedad->titulo}' ha sido ACEPTADA",
            ]);
        }

        return redirect()->back()->with('success', 'Cita aceptada y propiedad reservada.');
    }

    public function rechazar($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = 'rechazada';
        $cita->save();

        $usuario = Usuario::where('correo', $cita->correo)->first();
        if ($usuario) {
            Notificacion::create([
                'usuario_id' => $usuario->idUsuario,
                'mensaje' => "Tu cita para '{$cita->propiedad->titulo}' ha sido RECHAZADA",
            ]);
        }

        return redirect()->back()->with('success', 'Cita rechazada.');
    }
}
