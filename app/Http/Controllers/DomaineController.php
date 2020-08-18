<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sousdomaine;
use App\domaine;
use App\Administration;

class DomaineController extends Controller
{
    public function index(){
        $domaine=domaine::all();
        return view('domaines.index',compact('domaine'));
    }

    public function show($id){
        $domaine=domaine::find($id);
        $sousdomaine=sousdomaine::where('domaine_id','=', $id)->get();
        return view('domaines.show',compact('sousdomaine','domaine'));
    }

    public function store(){
        $data=request()->validate([
            'libelle'=>'required|min:5'
        ]);
        domaine::create($data);
        return redirect('/domaine')->with('message', 'Ajout effectuée avec succès.');
    }

    public function create(){
        $domaine=new domaine();
        return view('domaines.create');
    }

    public function edit(domaine $domaine){
        return view('domaines.edite',compact('domaine'));
    }

    public function update(domaine $domaine){
        $data=request()->validate([
            'libelle'=>'required|min:5'
        ]);
        $domaine->update($data);
        return redirect('/domaine')->with('message', 'Modification effectuée avec succès.');
    }

    public function destroy(domaine $domaine){
        $domaine->delete();
        return redirect('domaine')->with('message', 'Suppression effectuée avec succès.');      
    }

}
