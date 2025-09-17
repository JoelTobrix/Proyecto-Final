<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Propiedad;
use App\Models\Notificacion;
use App\Models\Usuario;
use App\Mail\ComprobanteCitaMailable;
use App\Mail\ComprobanteRechazoMailable;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Enviar correo con comprobante
        Mail::to($usuario->correo)->send(new ComprobanteCitaMailable($cita));
    }

    return redirect()->back()->with('success', 'Cita aceptada, propiedad reservada y comprobante enviado al cliente.');
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

        // Enviar comprobante PDF de rechazo
        Mail::to($usuario->correo)->send(new ComprobanteRechazoMailable($cita));
    }

    return redirect()->back()->with('success', 'Cita rechazada y comprobante enviado al cliente.');
}



     //Generar comprobante
   public function generarComprobante($id)
{
    $cita = Cita::with('propiedad')->findOrFail($id);
    $pdf = Pdf::loadView('pdf.comprobante', compact('cita'));
    return $pdf->download('Comprobante_Cita_'.$cita->idCita.'.pdf');
}



}
