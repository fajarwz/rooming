<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $room_name;
    public $receiver_name;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($room_name, $receiver_name, $url)
    {
        $this->room_name = $room_name;
        $this->receiver_name = $receiver_name;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Request booking baru')->view('emails.booking');
    }
}
