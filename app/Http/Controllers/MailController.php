<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class MailController extends Controller
{
    public function sendMail($name,$bookno,$email,$id){
        $details = array(
            'name' => $name,
            'book_no' => $bookno
        );
        $data= new stdClass;
        $data->name=$name;
        $data->book_no=$bookno;
        $data->id=$id;
        //  (
        //     'name' => $name,
        //     'book_no' => $bookno
        // );
        Mail::to($email)->send(new MyTestMail($data));
       // dd("Email sudah terkirim.");

    }
    public function mailtmp($name,$bookno){
        $details = [
            'name' => $name,
            'book_no' => $bookno
            ];
        $data=[
            'packages'=>$details
        ];
        return view('mail/booking',$data);
    }
}
