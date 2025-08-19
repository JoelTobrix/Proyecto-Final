<?php
namespace App\Http\Controllers;

use App\Models\Agente;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    public function agentes(){
         $agentes = Agente::where('rol_id', 2)->get();
          return view('inmobiliaria', compact('agentes'));
    }
}
?>