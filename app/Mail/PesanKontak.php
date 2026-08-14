<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PesanKontak extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $emailPengirim;
    public $pesan;

    public function __construct($nama, $emailPengirim, $pesan)
    {
        $this->nama = $nama;
        $this->emailPengirim = $emailPengirim;
        $this->pesan = $pesan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pesan Baru dari Website Wisata',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.kontak',
            with: [
                'nama' => $this->nama,
                'emailPengirim' => $this->emailPengirim,
                'pesan' => $this->pesan,
            ],
        );
    }
}

