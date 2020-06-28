<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un modèle</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="<?= isset($modele) && !empty($modele) ? route('updateModele',['id'=>$modele->id]) : route('createModele') ?>" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marque</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="status-select" name="marque" onchange="refreshList();">
                                    @if(!empty($modele))
                                        <option value="{{$modele->marques->id}}">{{$modele->marques->nom}}</option>
                                    @else
                                        <option>--Choisissez une marque--</option>
                                    @endif
                                    @foreach($marque as $uneMarque)
                                        @if(!empty($modele) && isset($modele) && $modele->marques->id === $uneMarque->id)
                                        @else
                                            <option value="{{$uneMarque->id}}">{{$uneMarque->nom}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modele</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="modele" value="<?= isset($modele) && !empty($modele) ? $modele->nom : '' ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="preview" class="img-fluid" src="#" alt="">
                        </div>
                            <button type="submit" class="btn btn-primary mb-2">Ajouter Modele</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection