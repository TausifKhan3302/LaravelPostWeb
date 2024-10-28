<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request){
        $request->validate([
        'name' => 'required|min:3|max:15|string',
        'email' => 'required|min:7|max:20',
        'subject' => 'required|min:5|max:30|string',
        'description' => 'required|min:10|max:150|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
        ];
       

        Mail::to('tausifkhan3302@gmail.com')->send(new sendEmail($data));
        return back()->with('success', 'Email sent successfully!');
    }
}
