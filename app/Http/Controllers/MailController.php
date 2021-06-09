<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){

        $details = [
        'title' => 'Mail from websitepercobaan.com',
        'body' => 'This is for testing email using smtp'
        ];

        Mail::to('welldyrosman@gmail.com')->send(new MyTestMail($details));

        dd("Email sudah terkirim.");

    }
    public function mailtmp(){
        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp'
            ];
        $data=[
            'details'=>$details
        ];
        return view('mail/booking',$data);
    }
}
