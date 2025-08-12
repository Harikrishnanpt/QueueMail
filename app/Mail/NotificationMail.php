<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class NotificationMail extends Mailable
{
    public $subjectLine;
    public $messageBody;

    public function __construct($subjectLine, $messageBody)
    {
        $this->subjectLine = $subjectLine;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
            ->view('emails.notification')
            ->with(['body' => $this->messageBody]);
    }
}
