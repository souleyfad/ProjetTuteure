<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('welcome');
    }
    public function store()
    {
       $data = request()->validate([
            'pseudo'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:5'
       ]);
       Mail::to('tes@test.com')->send(new ContactMail($data));

       return redirect('welcome')->with('message','message envoyé avec succès'); 
    }
}
