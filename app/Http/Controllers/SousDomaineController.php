<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sousdomaine;
use App\document;
use App\domaine;

class SousDomaineController extends Controller
{
    public function index(){
        $sousdomaine=sousdomaine::all();
        
        return view('sous_domaines.index',compact('sousdomaine'));
    }

    public function show($id){
        $sousdomaine=sousdomaine::find($id);
        $document=document::where('sousdomaine_id','=', $id)->get();
        return view('sous_domaines.show',compact('document','sousdomaine'));
    }

    public function store(){
        $data=new sousdomaine();
        $data=request()->validate([
            'libelle'=>'required|min:5',
            'domaine_id'=>'required|integer'
        ]);
        sousdomaine::create($data);
        return redirect('/sousdomaine')->with('message', 'Ajout effectuée avec succès.');;
    }

    public function create(){
        $sousdomaine=new sousdomaine();
        $domaine= domaine::all();

        return view('sous_domaines.create',compact('sousdomaine','domaine'));
    }

    public function edit(sousdomaine $sousdomaine){
        $domaine= domaine::all();

        return view('sous_domaines.edite',compact('sousdomaine','domaine'));
    }

    public function update(sousdomaine $sousdomaine){
        $data=request()->validate([
            'libelle'=>'required|min:5',
            'domaine_id'=>'required|integer'
        ]);
        $sousdomaine->update($data);
        return redirect('/sousdomaine')->with('message', 'Modification effectuée avec succès.');;
    }

    public function destroy(sousdomaine $sousdomaine){
        $sousdomaine->delete();
        return redirect('sousdomaine')->with('message', 'Suppression effectuée avec succès.');      
    }

}
