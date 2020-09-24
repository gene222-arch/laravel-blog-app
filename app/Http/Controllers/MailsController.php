<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Mails;
use App\Mail\TestMail;


class MailsController extends Controller
{

    public function index () {

        return view('pages.testmail');
    }


    public function store ( Request $request ) {

        $validator = Validator::make( $request->all(), [

            'email' => ['required', 'email'],
            'subject' => ['required', 'min:5'],
            'images.*' => ['required'],
            'message_body' => ['required', 'min:5']

        ]);

        if ( $validator->fails() ) {

            return response()->json(['error' => $validator->getMessageBag()->toArray()]);

        }

        $data = [
            'to' => $request->email,
            'subject' => $request->subject,
            'message_body' => $request->message_body
        ];

        // $uniqueFileName = [];

        // if ( $request->hasFile('images') ) {

        //     foreach ($request->only('images') as $key => $image) {

        //         $fileFullName = $image->getClientOriginalName();
        //         $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
        //         $mime = $image->getMimeType();
        //         $uniqueFileName[] = $fileName . '_' . \Carbon\Carbon::now() . '.' . $mime;
        //     }
            
        // } 

        Mail::send('pages.testmail', ['data' => $data], function ($email) use ($data, $request) {

            $email->to( $request->email )->subject( $request->subject );

            $attachments = [];

            // foreach ($request->file('images') as $image) {
            //     $attachments[] = [
            //         $image->getRealPath() => [
            //             'as' => $image->getClientOriginalName(),
            //             'mime' => $image->getMimeType()
            //         ]
            //     ];
            // }

            // if ( $request->hasFile('images') ) {

            //     foreach( $attachments as $attachment) {
            //         foreach ($attachment as $path => $fileParam) {
            //             $email->attach($path, $fileParam);
            //         }
            //     }
            // }   

        });

        $mail = new Mails;
        $mail->to = $data['to'];
        $mail->subject = $data['subject'];
        $mail->message = $data['message_body'];
        $mail->user_id = Auth::id();
        $mail->saveOrFail();
    
        return response()->json(['success' => 'Message Sent']);

    }


    // public function store ( Request $request ) {


    //     $request->validate([
    //         'email' => ['required', 'email'],
    //         'images.*' => ['required'],
    //         'subject' => ['required', 'max:255'],
    //         'message_body' => ['required']
    //     ]);

    //     $uniqueFileName = [];

    //     if ( $request->hasFile('images') ) {

    //         foreach ($request->file('images') as $key => $image) {

    //             $fileFullName = $image->getClientOriginalName();
    //             $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
    //             $mime = $image->getMimeType();
    //             $uniqueFileName[] = $fileName . '_' . \Carbon\Carbon::now() . '.' . $mime;
    //         }
            
    //     } 

    //     // set data
    //         $data = [
    //             'to' => [$request->input('email')],
    //             'subject' => $request->input('subject'),
    //             'body' => $request->input('message_body'),
    //             'images' => [$request->file('images')],
    //         ];

    //     // store data
    //         $mails = new Mails;
    //         $mails->to = $request->input('email');
    //         $mails->subject = $request->input('subject');
    //         $mails->message = $request->input('message_body');
    //         $mails->images = implode(',', $uniqueFileName);
    //         $mails->user_id = Auth::id();
            
    //     // send data via gmail
    //         if ( $mails->save() ) {

    //     // Mail::to($request->input('email'))->send(new TestMail($details, $subject));
    //             Mail::send('pages.testmail', ['data' => $data], function ($email) use ($data, $request) {

    //                 foreach ($data['to'] as $recipient) {

    //                     $email->to( $recipient )->subject( $data['subject'] );
    //                 }

    //                 $attachments = [];

    //                 foreach ($request->file('images') as $image) {
    //                     $attachments[] = [
    //                         $image->getRealPath() => [
    //                             'as' => $image->getClientOriginalName(),
    //                             'mime' => $image->getMimeType()
    //                         ]
    //                     ];
    //                 }

    //                 if ( $request->hasFile('images') ) {

    //                     foreach( $attachments as $attachment) {
    //                         foreach ($attachment as $path => $fileParam) {
    //                             $email->attach($path, $fileParam);
    //                         }
    //                     }
    //                 }
    //             });
    //         }

    //     // redirect
    //         return redirect('/contactus')->with([
    //             'success' => 'Email sent successfuly'
    //         ]);
    // }

}

