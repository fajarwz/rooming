<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $room_name;
    public $date;
    public $start_time;
    public $end_time;
    public $purpose;
    public $receiver_name;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $room_name, $date, $start_time, $end_time, $purpose, $receiver_name, $url)
    {
        $this->user_name = $user_name;
        $this->room_name = $room_name;
        $this->date = $date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->purpose = $purpose;
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
