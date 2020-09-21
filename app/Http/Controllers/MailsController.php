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

        echo count($request->file('images'));

        $request->validate([
            'email' => ['required', 'email'],
            'images.*' => ['required'],
            'subject' => ['required', 'max:255'],
            'message_body' => ['required']
        ]);
        //
        $uniqueFileName = [];

        if ( $request->hasFile('images') ) {

            foreach ($request->file('images') as $key => $image) {
                $fileFullName = $image->getClientOriginalName();
                $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
                $mime = $image->getMimeType();
                $uniqueFileName[] = $fileName . '_' . \Carbon\Carbon::now() . '.' . $mime;
            }
            
        } 

        // set data
            $data = [
                'to' => [$request->input('email')],
                'subject' => $request->input('subject'),
                'body' => $request->input('message_body'),
                'images' => [$request->file('images')],
            ];

        // store data
            $mails = new Mails;
            $mails->to = $request->input('email');
            $mails->subject = $request->input('subject');
            $mails->message = $request->input('message_body');
            $mails->images = implode(',', $uniqueFileName);
            $mails->user_id = Auth::id();
            
        // send data via gmail
            if ( $mails->save() ) {

        // Mail::to($request->input('email'))->send(new TestMail($details, $subject));
                Mail::send('pages.testmail', ['data' => $data], function ($email) use ($data, $request) {

                    foreach ($data['to'] as $recipient) {

                        $email->to( $recipient )->subject( $data['subject'] );
                    }

                    $attachments = [];

                    foreach ($request->file('images') as $image) {
                        $attachments[] = [
                            $image->getRealPath() => [
                                'as' => $image->getClientOriginalName(),
                                'mime' => $image->getMimeType()
                            ]
                        ];
                    }

                    if ( $request->hasFile('images') ) {

                        foreach( $attachments as $attachment) {
                            foreach ($attachment as $path => $fileParam) {
                                $email->attach($path, $fileParam);
                            }
                        }
                    }
                });
            }

        // redirect
            return redirect('/contactus')->with([
                'success' => 'Email sent successfuly'
            ]);
    }

}
