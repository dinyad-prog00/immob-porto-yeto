<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RdvMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    

    private $rdv;
    private $auteur;
    
    
    public function __construct($rdv,$auteur)
    {
        //
        $this->rdv = $rdv;
        $this->auteur = $auteur;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        if($this->rdv->etat == "confirme")
            $sbj="Confirmation d'un de vos rendez-vous";
        else
            $sbj="Déconfirmation d'un de vos rendez-vous";

            return $this->from('donatien.yeto@gmail.com', 'Immob Porto')
            ->subject($sbj)
            ->markdown('mail.rdv')
            ->with([
                'auteur' => $this->auteur,
                'rdv' => $this->rdv
            ]);

    }
}
