<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class MovieController extends Controller
{
    /**
     * Show all movies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Lazy Loading
        //$movies = Film::all();
        //Eager Loading
        $movies = Film::with(['genre:id_genre,nom', 'distributeur:id_distributeur,nom'])->get();
        return view('movie', ['movies'=>$movies] );
    }
}
