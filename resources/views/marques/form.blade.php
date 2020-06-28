<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une voiture</div>
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
                    <form method="POST" action="<?= isset($marque) && !empty($marque) ? route('updateMarque',['id'=>$marque->id]) : route('createMarque') ?>" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marque</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="marque" value="<?= isset($marque) && !empty($marque) ? $marque->nom : '' ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="preview" class="img-fluid" src="#" alt="">
                        </div>
                            <button type="submit" class="btn btn-primary mb-2">Ajouter marque</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection