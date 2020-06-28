<?php

namespace App\Http\Controllers;

use App\Location;
use App\Marque;
use App\Modele;
use App\Voiture;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locateByUser = Location::where('id_user', '=', Auth::user()->id)->get()->last();
        $voiture = Voiture::all();
        return view('voitures.boutique',['voiture' => $voiture,'locateByUser'=>$locateByUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'date' => 'required|date|before_or_equal:tomorrow',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:4000',
                'marque' => 'required',
                'modele' => 'required',
                'prix' => 'required',
                'description' => 'required|string',
                'kilometrage' => 'required|int',
            ], // rules
            ['date.before_or_equal' => 'La date d\'immatriculation ne peut pas être supérieur à la date du jour'] // Message$validatedData = 
        );

        $voiture = new Voiture();
        $voiture->id_marque = $request->marque;
        $voiture->id_modele = $request->modele;
        $voiture->prix = $request->prix;
        $voiture->couleur = $request->couleur;
        $voiture->date_immat = $request->date;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save( public_path('uploads/voitures/' . $filename) );
        }
        $voiture->image = $filename;
        $voiture->description = $request->description;
        $voiture->kilometrage = $request->kilometrage;
        $voiture->save();
        return redirect()->route('home')->with('status','Le véhicule a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showForm($id=null)
    {
        /* $date = Carbon::today()->format('d/m/Y'); */
        $voiture = isset($id) ? Voiture::find($id) : '';
        $marque = Marque::all();
        $modele = Modele::with(['marques:id,nom'])->get();
        return view('voitures.showForm',['marque'=>$marque,'modele'=>$modele, 'voiture' => $voiture]);
    }

    public function ajax()
    {;
        $choix = $_GET['choix'];
        $modele = Modele::where('id_marque', '=', $choix)->get();
        $list = [];

        foreach($modele as $unModele){
            $tab = [$unModele->id,$unModele->nom];
            $list[] = $tab;
        }

        echo json_encode($list);
    }

    public function show($id)
    {
        $voiture = Voiture::find($id);
        return view('voitures.show',['voiture'=>$voiture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'date' => 'required|date|before_or_equal:tomorrow',
                'marque' => 'required',
                'modele' => 'required',
                'prix' => 'required',
                'description' => 'required|string',
                'kilometrage' => 'required|int',
                'image' => 'image|mimes:jpeg,jpg,png|max:4000|nullable'
            ], // rules
            ['date.before_or_equal' => 'La date d\'immatriculation ne peut pas être supérieur à la date du jour'] // Message$validatedData = 
        );

        $voiture = Voiture::find($id);
        $voiture->id_marque = $request->marque;
        $voiture->id_modele = $request->modele;
        $voiture->prix = $request->prix;
        $voiture->couleur = $request->couleur;
        $voiture->date_immat = $request->date;
        $voiture->description = $request->description;
        $voiture->kilometrage = $request->kilometrage;
        if(!empty($request->image)){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save( public_path('uploads/voitures/' . $filename) );
            }
            $voiture->image = $filename;
        }
        $voiture->save();
        return redirect()->route('home')->with('status','Le véhicule a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voiture = Voiture::find($id);
        $voiture->delete();
        return redirect()->route('boutique')->with('status','Le véhicule a bien été supprimé');
    }
}
