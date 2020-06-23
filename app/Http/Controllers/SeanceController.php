<?php

namespace App\Http\Controllers;


use App\Seance;
use App\Film;
use App\Salle;
use App\Personne;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Fonction;

class SeanceController extends Controller
{
    /**
     * Show all seance.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Lazy Loading
        //$movies = Film::all();
        //Eager Loading
        $seances = Seance::with(
            ['film',
            'salle',
            'technicien',
            'ouvreur',
            'menage'
            ])->get();


        return view('seance', ['seances'=>$seances] );
    }

    public function create()
    {
        $seances = Seance::all();
        $ouvreurs = Fonction::where('nom', '=', 'hotesse')->first()->personnes;
        $techniciens = Fonction::where('nom', '=', 'projectionniste')->first()->personnes;
        $nettoyeurs = Fonction::where('nom', '=', 'agent entretien')->first()->personnes;
        $movies = Film::with(['genre:id_genre,nom', 'distributeur:id_distributeur,nom'])->get();
        $salles = Salle::all();
        $personnes = Personne::with(['fonctions'])->get();
        return view('seancecreate', ['movies'=>$movies,'salles'=>$salles,'seances'=>$seances,'personnes'=>$personnes,'ouvreurs'=>$ouvreurs,'techniciens'=>$techniciens,'nettoyeurs'=>$nettoyeurs]);
    }

    public function add_seance(Request $request)
    {
        $request->validate(
            ['start' => 'required|date|after_or_equal:tomorrow'], // rules
            ['start.after_or_equal' => 'Erreur'] // Message$validatedData = 
        );
        
        $film = Film::find($request->film);
        $seance = new Seance;
        $seance->id_film = $request->film;
        $seance->debut_seance = Carbon::create($request->start);
        $seance->fin_seance = $seance->debut_seance->addMinutes($film->duree_minutes);
        $seance->id_salle = $request->salle;
        $seance->id_personne_ouvreur = $request->ouvreur;
        $seance->id_personne_technicien = $request->technicien;
        $seance->id_personne_menage = $request->menage;
        $seance->save();
        return redirect('/seance/create');
    }
}
