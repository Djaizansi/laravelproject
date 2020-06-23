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
                    <br>
                    <a href="{{route('create')}}">Go to Create seance</a>
                    <br><br>
                    <table class="table">
                        <thead class="thead-dark">
                            <th scope="col">Film</th>
                            <th scope="col">Salle</th>
                            <th scope="col">Place</th>
                            <th scope="col">Ouvreur</th>
                            <th scope="col">Technicien</th>
                            <th scope="col">Menage</th>
                        </thead>
                        
                        <tbody>
                            @foreach ($seances as $seance)
                            <tr>
                                    <td>{{isset($seance->film) ? $seance->film->titre : ''}}</td>
                                    <td>{{isset($seance->salle) ? $seance->salle->nom_salle : ''}}</td>
                                    <td>{{isset($seance->salle) ? $seance->salle->places : ''}}</td>
                                    <td>{{isset($seance->ouvreur) ? $seance->ouvreur->nom : ''}} {{isset($seance->ouvreur) ? $seance->ouvreur->prenom : ''}}</td>
                                    <td>{{isset($seance->technicien) ? $seance->technicien->nom : ''}} {{isset($seance->technicien) ? $seance->technicien->prenom : ''}}</td>
                                    <td>{{isset($seance->menage) ? $seance->menage->nom : ''}} {{isset($seance->menage) ? $seance->menage->prenom : ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection