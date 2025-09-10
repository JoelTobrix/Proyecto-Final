<?php
namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\RespuestaConsulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['propiedad', 'agente'])->get();
        return response()->json($consultas);
    }

    public function show($id)
    {
        $consulta = Consulta::with(['respuestas.usuario', 'propiedad', 'agente'])->findOrFail($id);
        return response()->json($consulta);
    }

    public function responder(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        $respuesta = RespuestaConsulta::create([
            'consulta_id' => $consulta->id,
            'usuario_id'  => auth()->id() ?? 1, // 👈 cambia según tu login
            'mensaje'     => $request->mensaje
        ]);

        $consulta->estado = 'respondida';
        $consulta->save();

        return response()->json(['success' => true, 'respuesta' => $respuesta]);
    }

    public function cerrar($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->estado = 'cerrada';
        $consulta->save();

        return response()->json(['success' => true]);
    }

    
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string',
        'email' => 'required|email',
        'telefono' => 'required|string',
        'propiedad_id' => 'nullable|exists:propiedades,idPropiedad',
        'mensaje' => 'required|string',
    ]);

    $consulta = new Consulta();
    $consulta->nombre = $request->nombre;
    $consulta->email = $request->email;
    $consulta->telefono = $request->telefono;
    $consulta->propiedad_id = $request->propiedad_id;
    $consulta->mensaje = $request->mensaje;
    $consulta->estado = 'pendiente';
    $consulta->save();

    return response()->json([
        'success' => true,
        'consulta' => $consulta
    ]);
}

}
