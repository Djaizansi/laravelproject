<?php

namespace App\Http\Controllers;

use App\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function showForm($id=null)
    {
        $marque = isset($id) ? Marque::find($id) : '';
        return view('marques.form',['marque'=>$marque]);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'marque' => 'required|string|min:4|max:20',
            ], // rules
        );

        $marque = new Marque();
        $marque->nom = $request->marque;
        $marque->save();
        return redirect()->route('home')->with('status','La marque a bien été ajouté');
    }

    public function show()
    {
        $marque = Marque::all();
        return view('marques.show',['marque'=>$marque]);
    }

    public function update(Request $request, $id)
    {
        $marque = Marque::find($id);
        $request->validate(
            [
                'marque' => 'required|string|min:4|max:20',
            ], // rules
        );
        $marque = Marque::find($id);
        $marque->nom = $request->marque;
        $marque->save();
        return redirect()->route('showMarque')->with('status','La marque a bien été modifié');
    } 
    
    public function destroy($id)
    {
        $marque = Marque::find($id);
        $marque->delete();
        return redirect()->route('showMarque')->with('status','La marque a bien été supprimé');
    }
}
