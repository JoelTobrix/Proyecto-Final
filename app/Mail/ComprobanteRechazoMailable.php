<?php

namespace App\Mail;

use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class ComprobanteRechazoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $cita;

    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    public function build()
    {
        // Generar PDF con una vista diferente
        $pdf = Pdf::loadView('pdf.comprobante_rechazo', ['cita' => $this->cita]);

        return $this->subject('Comprobante de Cita Rechazada')
                     ->view('pdf.comprobante_rechazo') 
                    ->attachData($pdf->output(), 'Comprobante_Rechazo_'.$this->cita->idCita.'.pdf');
    }
}
?>