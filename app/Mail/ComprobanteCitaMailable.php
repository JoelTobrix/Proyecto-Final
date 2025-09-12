<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cita;
use Barryvdh\DomPDF\Facade\Pdf;

class ComprobanteCitaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $cita;

    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    public function build()
    {
        $pdf = Pdf::loadView('pdf.comprobante', ['cita' => $this->cita]);

        return $this->subject('Comprobante de cita inmobiliaria')
                    ->view('emails.confirmacion')
                    ->attachData($pdf->output(), "comprobante_cita_{$this->cita->idCita}.pdf");
    }
}
