<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\document;
use App\sousdomaine;
use App\domaine;

class DocumentController extends Controller
{
    public function index(){
        $document=document::all();
        $domaine= domaine::all();
        return view('document.index',compact('document','domaine'));
    }

    public function show($id){
        $document=document::find($id);
        return view('document.show',compact('document'));
    }

    public function search(Request $request){
        $domaine= domaine::all();

        $search= $request->get('search');
        $document=DB::table('documents')->where('titre', 'like', '%'.$search.'%')->get();
        return view('document.search',compact('document','sousdomaine'));   
    }

    public function store(Request $request){
        $data= new document();

        if ($request->file('doc')){
            $file=$request->file('doc');
            $nom=$file->getClientOriginalName();
            $filename=$nom.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/fichier/',$filename);

            $data->doc=$filename;
        }
        $data->domaine_id= $request->domaine_id;
        $data->sousdomaine_id= $request->sousdomaine_id;
        $data->titre= $request->titre;
        $data->auteur= $request->auteur;
        $data->date_publication= $request->date_publication;
        $data->theme= $request->theme;

        $data->save();
        return redirect('document')->with('message', 'Ajout effectuée avec succès.');;
    }
    
    public function update(document $document,Request $request){
        //$data= document::where('id', $document);

        if ($request->file('doc')){
            $file=$request->file('doc');
            $nom=$file->getClientOriginalName();
            $filename=$nom.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/fichier/',$filename);
        }
        $data= request()->validate([ $document->doc=$filename,
        $document->domaine_id= $request->domaine_id,
        $document->sousdomaine_id= $request->sousdomaine_id,
        $document->titre= $request->titre,
        $document->auteur= $request->auteur,
        $document->date_publication= $request->date_publication,
        $document->theme= $request->theme]);

        $document->update($data);
        return redirect('/document')->with('message', 'Modification effectuée avec succès.');;
    }

    public function create(){
        $domaine= domaine::all();
        $sousdomaine=sousdomaine::all(); //where('domaine_id', $domaine)->get();
        return view('document.create',compact('sousdomaine','domaine'));
    }

    public function edit(document $document){
        $domaine= domaine::all();
        $sousdomaine=sousdomaine::all(); //where('domaine_id', $domaine)->get();;
        return view('document.edite',compact('document','sousdomaine','domaine'));
    }

    public function download($doc){
        return response()->download('storage/fichier/'.$doc);
    }

    public function destroy(document $document){
        $document->delete();
        return redirect('document')->with('message', 'Suppression effectuée avec succès.');;      
    }
    
}
