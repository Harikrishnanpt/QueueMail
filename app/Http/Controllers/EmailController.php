<?php
namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);


        dispatch(new SendEmailJob(
            $validated['email'],
            $validated['subject'],
            $validated['message']
        ))
        ->onQueue('emails');

    
        return back()->with('success', 'Email queued successfully!');
    }
}
