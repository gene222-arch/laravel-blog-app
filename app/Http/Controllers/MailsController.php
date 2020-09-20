<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Mails;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Symfony\Component\HttpFoundation\Response;

class MailsController extends Controller
{

    public function index () {

        return view('pages.testmail');
    }

    public function store ( Request $request ) {

        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'message_body' => 'required'
        ]);

        $details = [
            'title' => $request->input('subject'),
            'body' => $request->input('message_body')
        ];

        $Mails = new Mails;
        $Mails->from = $request->input('email') ?? Auth::user()->eMails;
        $Mails->subject = $request->input('subject');
        $Mails->message = $request->input('message_body');
        $Mails->user_id = Auth::id();
        
        if ( $Mails->save() ) {

            Mail::to($request->input('email'))->send(new TestMail($details));
        }

        return redirect('/contactus')->with([
            'success' => 'Email sent successfuly'
        ]);

    }

}
