<?php
namespace App\Jobs;

use App\Mail\NotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class SendEmailJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public $email;
    public $subject;
    public $message;
    public $tries = 3;
    public $timeout = 30;

    public function __construct($email, $subject, $message)
    {
        $this->email = trim($email);
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle()
    {
        Mail::to($this->email)->send(
            new NotificationMail($this->subject, $this->message)
        );
    }

    public function failed(\Throwable $exception)
    {
        Log::error("Email sending failed to {$this->email}: {$exception->getMessage()}");
    }
}
