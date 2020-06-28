<?php use Carbon\Carbon; ?>
@extends('layouts.app')

@section('content')
<?php 
    /* $now = Carbon::now();
    $choix = Carbon::parse('2020-07-01');
    $dif = $now->diffInDays($choix);
    dd($dif); */
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Louer une voiture</div>
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
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Utilisateur </label>
                            <div class="col-sm-9">
                                <p class="form-control" style="border: none;">{{Auth::user()->name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Voiture </label>
                            <div class="col-sm-9">
                                <p class="form-control" style="border: none;">{{$voiture->marques->nom}} {{$voiture->modeles->nom}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date de fin</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date_fin" id="date" onchange="refreshPrice();">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Prix</label>
                            <div class="col-sm-9" id="inputPrice">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="preview" class="img-fluid" src="#" alt="">
                        </div>
                            <button type="submit" class="btn btn-primary mb-2">Valider location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        function refreshPrice(){
            var choix = $('#date').val();
            $.ajax({
                url: "{{route('ajaxPrice',['id'=>$voiture->id])}}",
                type: 'GET',
                data: 'choix='+ choix,
                success: function(data){
                    if(data){
                        var tab = $.parseJSON(data);
                        var html;
                        for (var i=0; i < tab.length; i++){
                            html = '<input class="form-control" style="border: none;" name="prix" value='+tab[i][0]+'>';
                        }
                        $('#inputPrice').html(html);
                    }
                }
            });
        }
</script>
@endsection