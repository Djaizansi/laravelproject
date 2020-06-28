<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Véhicule</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <img src="../../uploads/voitures/{{$voiture->image}}" alt="voiture">
                        </div>
                        <div class="col-6">
                            <h2>{{$voiture->marques->nom}} {{$voiture->modeles->nom}}</h2>
                            <p>{{$voiture->description}}</p>
                            <p>Date d'immatriculation : {{Carbon::parse($voiture->date_immat)->format('d/m/Y')}}</p>
                            <p>Kilometrage : {{$voiture->kilometrage}}Km</p>
                            <p>Prix journalier : {{$voiture->prix}} € /jour</p>
                            <a href="{{route('formLocation',['id' => $voiture->id])}}" class="btn btn-primary">Loue moi !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection