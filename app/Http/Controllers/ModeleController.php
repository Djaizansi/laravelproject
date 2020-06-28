<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function showForm($id=null)
    {
        $marque = Marque::all();
        $modele = isset($id) ? Modele::find($id) : '';
        return view('modeles.form',['marque'=>$marque,'modele'=>$modele]);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'marque' => 'required|string',
                'modele' => 'required|string|min:2|max:20'
            ], // rules
        );

        $modele = new Modele();
        $modele->id_marque = $request->marque;
        $modele->nom = $request->modele;
        $modele->save();
        return redirect()->route('home')->with('status','Le modele a bien été ajouté');
    }

    public function show()
    {
        $modele = Modele::all();
        return view('modeles.show',['modele'=>$modele]);
    }

    public function update(Request $request, $id)
    {
        $modele = Modele::find($id);
        $request->validate(
            [
                'marque' => 'required|string',
                'modele' => 'required|string|min:2|max:20',
            ], // rules
        );
        $modele = Modele::find($id);
        $modele->id_marque = $request->marque;
        $modele->nom = $request->modele;
        $modele->save();
        return redirect()->route('showModele')->with('status','La modele a bien été modifié');
    }
    
    public function destroy($id)
    {
        $modele = Modele::find($id);
        $modele->delete();
        return redirect()->route('showModele')->with('status','La modele a bien été supprimé');
    }
}
