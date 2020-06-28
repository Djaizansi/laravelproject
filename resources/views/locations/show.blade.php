<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes locations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>Utilisateur</th>
                            <th>Voiture</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Prix Total</th>
                        </thead>
                        
                        <tbody>
                            @foreach($location as $uneLoc)
                                <tr>
                                    <td>{{$uneLoc->users->name}}</td>
                                    <td>{{$uneLoc->voitures->marques->nom}} {{$uneLoc->voitures->modeles->nom}}</td>
                                    <td>{{Carbon::parse($uneLoc->date_debut)->format('d/m/Y')}}</td>
                                    <td>{{Carbon::parse($uneLoc->date_fin)->format('d/m/Y')}}</td>
                                    <td>{{$uneLoc->prix}} € </td>
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