@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Films</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('home')}}">Return to Home</a>
                    <br><br>
                    <ul>
                        @foreach ($movies as $movie)
                            <li>
                                {{$movie->titre}} 
                                @if($movie->genre)
                                    : {{ $movie->genre->nom }}
                                @endif
                                @if($movie->distributeur)
                                    <i>by{{ $movie->distributeur->nom }}</i>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection