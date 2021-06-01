<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SousMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void

     */
    private $titre;
    private $auteur;
    private $name;
    private $message;
    public function __construct($name,$auteur,$titre,$message)
    {
        //
        $this->name = $name;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('donatien.yeto@gmail.com', 'Immob Porto')
            ->subject('Souscription à une de vos annonces')
            ->markdown('mail.sous')
            ->with([
                'name' => $this->name,
                'titre' => $this->titre,
                'auteur' => $this->auteur,
                'message' => $this->message
            ]);
    }
}
