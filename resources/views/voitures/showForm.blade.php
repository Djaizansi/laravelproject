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

                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marque</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="status-select" name="marque" onchange="refreshList();">
                                <option>--Choisissez une marque--</option>
                                @foreach($marque as $uneMarque)
                                    <option value="{{$uneMarque->id}}">{{$uneMarque->nom}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modèle</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="status-select2" name="modele">
                                <option>--Choisissez un modele--</option>
                                @foreach($modele as $unModele)
                                    <option value="{{$unModele->id}}">{{$unModele->nom}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date d'immatriculation</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Prix /jour</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="prix" min="10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Couleur</label>
                            <div class="col-sm-9">
                                <input type="color" class="form-control" name="couleur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kilometrage</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="kilometrage" min="10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" accept="image/png, image/jpeg, image/jpg" name="image" min="10">
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="preview" class="img-fluid" src="#" alt="">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Ajouter véhicule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function refreshList(){
            var choix = $('#status-select').val();
            $.ajax({
                url: "{{route('ajax')}}",
                type: 'GET',
                data: 'choix='+ choix,
                success: function(data){
                    if(data){
                        var tab = $.parseJSON(data);
                        var html;
                        for (var i=0; i < tab.length; i++){
                            html = html + '<option value='+tab[i][0]+'>'+tab[i][1]+'</option>';
                        }
                        $('#status-select2').html(html);
                    }
                }
            });
        }
    </script>
@endsection