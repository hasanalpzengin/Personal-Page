<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class MailController extends Controller
{
    public function send(Request $request){
        $data = [
            'email' => $request->txtEmail,
            'name' => $request->txtName,
            'text' => $request->txtMsg,
            'phone' => $request->txtPhone
        ];
        Mail::send('partials.mail', $data, function($message) use ($data){
            $message->from($data['email'],$data['name']);
            $message->to('hasalp38@gmail.com','Admin')->subject('hasanalpzengin.com contact');
        });
        return redirect('/contact')->with('success',true);
    }
}
