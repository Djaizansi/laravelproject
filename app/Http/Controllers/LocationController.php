<?php

namespace App\Http\Controllers;

use App\Location;
use App\Voiture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function showForm($id=null)
    {
        $voiture = Voiture::find($id);
        return view('locations.showForm',['voiture' => $voiture]);
    }
    
    public function show()
    {
        $location = Auth::user()->roles === "admin" ? Location::all() : Location::where('id_user','=',Auth::user()->id)->get();
        return view('locations.show',['location' => $location]);
    }

    public function create(Request $request, $id)
    {
        $request->validate(
            [
                'date_fin' => 'required|date|after_or_equal:tomorrow',
                'prix' => 'required|int',
            ], // rules
            ['date_fin.after_or_equal' => 'La date de fin ne peut pas être inférieur à la date du jour'] // Message$validatedData = 
        );

        $location = new Location();
        $location->timestamps = false;
        $location->date_debut = Carbon::today();
        $location->date_fin = $request->date_fin;
        $location->prix = $request->prix;
        $location->id_user = Auth::user()->id;
        $location->id_voiture = $id;
        $location->save();
        return redirect()->route('home')->with('status','Votre location a bien été prise en compte et se termine le '.Carbon::parse($request->date_fin)->format('d/m/Y'));
    }

    public function ajax($id)
    {;
        $choix = $_GET['choix'];
        $voiture = Voiture::find($id);
        $prix = $voiture->prix;

        $now = Carbon::today();
        $dif = $now->diffInDays($choix) + 1;

        $prixTotal = $voiture->prix * $dif;

        $list = [];
        $tab = [$prixTotal];
        $list[] = $tab;
        echo json_encode($list);
    }
}
