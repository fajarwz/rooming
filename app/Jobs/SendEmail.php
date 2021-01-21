<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Mail\BookingMail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $receiver_email;

    public $user_name;
    public $room_name;
    public $date;
    public $start_time;
    public $end_time;
    public $purpose;
    public $to_role;
    public $receiver_name;
    public $url;
    public $status;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $receiver_email, 
        $user_name, 
        $room_name, 
        $date, 
        $start_time, 
        $end_time, 
        $purpose, 
        $to_role, 
        $receiver_name, 
        $url, 
        $status
    )
    {
        $this->receiver_email   = $receiver_email;
        $this->user_name        = $user_name;
        $this->room_name        = $room_name;
        $this->date             = $date;
        $this->start_time       = $start_time;
        $this->end_time         = $end_time;
        $this->purpose          = $purpose;
        $this->to_role          = $to_role;
        $this->receiver_name    = $receiver_name;
        $this->url              = $url;
        $this->status           = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->receiver_email)
            ->send(new BookingMail(
                $this->user_name, 
                $this->room_name, 
                $this->date, 
                $this->start_time,
                $this->end_time, 
                $this->purpose, 
                $this->to_role, 
                $this->receiver_name, 
                $this->url, 
                $this->status
            ));
    }
}
