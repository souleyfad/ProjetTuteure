<?php

namespace App\Http\Controllers;

use App\commentaire;
use App\document;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(document $document)
    {
        request()->validate([
            'contenu'=>'required|min:5'
        ]);
        $commentaire = new commentaire();
        $commentaire->contenu= request('contenu');
        $commentaire->user_id= auth()->user()->id;

        $document->commentaire()->save($commentaire);
        return redirect()->route('document.show', $document);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(commentaire $commentaire)
    {
        //
    }
}
