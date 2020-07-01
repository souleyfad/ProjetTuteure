<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'message'=>'required'
       ]);
       Mail::to('tes@test.com')->send(new ContactMail($data));

       return redirect('welcome')->with('message','message envoyé avec succès'); 
    }
}
