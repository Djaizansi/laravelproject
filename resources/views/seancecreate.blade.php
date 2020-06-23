@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seances</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('home')}}">Return to Home</a>
                    <br><br>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('add_seance')}}" method="post">
                        @csrf
                        Début de la séance : <input type="text" name=start value="2020-01-01 12:00:00"></br>
                        <label>Film: </label>
                        <select name="film">
                            @foreach ($movies as $movie)
                                <option value="{{$movie->id_film}}">{{$movie->titre}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Salle: </label>
                        <select name="salle">
                            @foreach ($salles as $salle)
                                <option value="{{$salle->id_salle}}">{{$salle->nom_salle}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Ouvreur: </label>
                        <select name=ouvreur>
                            @foreach($personnes as $personne)
                                @if($personne->hasFonction('hotesse'))
                                    <option value="{{$personne->id_personne}}">{{$personne->nom}} {{$personne->prenom}}</option>
                                @endif
                            @endforeach
                        </select>
                        <br>
                        <label>Technicien: </label>
                        <select name=technicien>
                            @foreach($personnes as $personne)
                                @if($personne->hasFonction('projectionniste'))
                                    <option value="{{$personne->id_personne}}">{{$personne->nom}} {{$personne->prenom}}</option>
                                @endif
                            @endforeach
                        </select>
                        <br>
                        <label>Menage: </label>
                        <select name="menage">
                            @foreach($personnes as $personne)
                                @if($personne->hasFonction('agent entretien'))
                                    <option value="{{$personne->id_personne}}">{{$personne->nom}} {{$personne->prenom}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type=submit value="enregistrer la séance">
                    </form>
                    Listes des séances :<br>
                    <ul>
                        @foreach($seances as $seance)
                        <li>
                            <b>{{ $seance->film->titre }}</b> {{ $seance->debut_seance->format('l jS \\of F Y h:i:s A') }}
                            <i>salle {{ $seance->salle->nom_salle }}</i>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection