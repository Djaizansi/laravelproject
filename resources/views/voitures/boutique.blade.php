<?php
use App\Location;
use Carbon\Carbon; ?>

@extends('layouts.app')
<link href="{{ asset('css/card_voiture.css') }}" rel="stylesheet">
<style>
#carre {
    height: 15px;
    width: 15px;
}
</style>
@section('content')
        <div class="container">
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
                    <h1 class="text-center">La boutique</h1>
                    <br>
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="width:1100px;margin-bottom:150px;">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('images/images1.jpg') }}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Audi A3 2020</h5>
                                    <p>Disponible maintenant sur CarLocation</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/images2.jpg') }}" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Fiat Abarth</h5>
                                    <p>Bientot disponible sur Carlocation</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/images3.jpg') }}" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Lamborghini Huaracan</h5>
                                    <p>Bientot disponible sur CarLocation</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>
                <h2 class="text-center">Les véhicules disponible maintenant</h2>
                <?php $date_fin = isset($locateByUser) ? $locateByUser->date_fin : '';?>
                @if (Carbon::today() < $date_fin)
                    <p class="text-center" style="color: red;">Vous ne pourrez pas loué de véhicule car votre location actuelle n'est pas terminée</p>
                @else
                @endif
                <br>
                <div class="row justify-content-center">
                    @foreach($voiture as $uneVoiture)
                        <?php $id = $uneVoiture->id; ?>
                        <?php $location = Location::where('id_voiture','=',$id)->get()->last(); ?>
                        <?php $date_fin_vehicule = isset($location) ? $location->date_fin : '' ?>
                            <div class="car-card">
                                <div class="car-header img-media">
                                    <div class="header-icon-container">
                                        @if (Auth::user()->roles === 'admin')
                                            <img class="imgHeader" src="uploads/voitures/{{$uneVoiture->image}}" alt="voiture">
                                        @elseif (Auth::user()->roles === 'client' && !isset($location) && Carbon::today() >= $date_fin)
                                            <a href="{{route('show',['id'=>$uneVoiture->id])}}"><img class="imgHeader" src="uploads/voitures/{{$uneVoiture->image}}" alt="voiture"></a>
                                        @elseif(isset($location) && Carbon::today() >= $date_fin)
                                            @if(Carbon::today() < $location->date_fin)
                                                <img class="imgHeader" style="filter: grayscale(100%);" src="uploads/voitures/{{$uneVoiture->image}}" alt="voiture">
                                            @elseif(Carbon::today() >= $location->date_fin)
                                                <a href="{{route('show',['id'=>$uneVoiture->id])}}"><img class="imgHeader" src="uploads/voitures/{{$uneVoiture->image}}" alt="voiture"></a>
                                            @endif
                                        @elseif(isset($locateByUser) && Carbon::today() < $date_fin )
                                            <img class="imgHeader" style="filter: grayscale(100%);" src="uploads/voitures/{{$uneVoiture->image}}" alt="voiture">
                                        @endif
                                    </div>
                                </div><!--car-header-->
                                <div class="car-content">
                                    <div class="car-content-header">
                                        @if (!isset($location))
                                            <h3 class="car-title">{{$uneVoiture->marques->nom}} {{$uneVoiture->modeles->nom}}</h3>
                                        @elseif (isset($location))
                                            <h3 class="car-title">{{$uneVoiture->marques->nom}} {{$uneVoiture->modeles->nom}} <?= Carbon::today() < $location->date_fin ? '(Louée) Dispo '.Carbon::parse($location->date_fin)->format('d/m/Y') : ''?></h3>
                                        @endif
                                        <div class="imax-logo"></div>
                                    </div>
                                    <div class="car-info">
                                        <div class="info-section">
                                            <label class="text-center">Date</label>
                                            <span>{{Carbon::parse($uneVoiture->date_immat)->format('d/m/Y')}}</span>
                                        </div>
                                        <div class="info-section">
                                            <label>Prix /jour</label>
                                            <span>{{$uneVoiture->prix}} €</span>
                                        </div>
                                        <div class="info-section">
                                            <label>Couleur</label>
                                            <div id="carre" style="background-color:<?=$uneVoiture->couleur?>; margin:0 auto;"></div>
                                        </div>
                                        <div class="info-section">
                                            <label>Kilometrage</label>
                                            <span>{{$uneVoiture->kilometrage}} Km</span>
                                        </div>
                                        @if (Auth::user()->roles === 'admin' && $date_fin_vehicule <= Carbon::today())
                                            <div class="info-section">
                                                <label>Actions</label>
                                                <span><a href="{{route('formUpdate', ['id' => $uneVoiture->id])}}"><i class="fas fa-pen"></i></a></span>
                                                <span><a style="background-color: #fff !important; border: none !important;" href="{{route('delete', ['id' => $uneVoiture->id])}}" onclick="return confirm('Etes vous sûre de vouloir supprimer cette voiture ?');"><i class="fas fa-trash" style="color:red;"></i></a></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

        </div>

    <script>
        $(document).ready(function(){
            $(".carousel").carousel({
                interval: 10000
            });
        });
    </script>
@endsection