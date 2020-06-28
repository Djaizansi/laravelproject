@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modele</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>ID</th>
                            <th>Marque</th>
                            <th>Modele</th>
                            @if(Auth::user()->roles === "admin")
                                <th>Action</th>
                            @endif
                        </thead>
                        
                        <tbody>
                            @foreach ($modele as $unModele)
                            <tr>
                                <td>{{$unModele->id}}</td>
                                <td>{{$unModele->marques->nom}}</td>
                                <td>{{$unModele->nom}}</td>
                                @if(Auth::user()->roles === "admin")
                                    <td>
                                        <a href="{{route('formUpdateModele', ['id' => $unModele->id])}}"><i class="fas fa-pen"></i></a>
                                        <a style="background-color: #fff !important; border: none !important;" href="{{route('deleteModele', ['id' => $unModele->id])}}" onclick="return confirm('Etes vous sûre de vouloir supprimer ce modèle ?');"><i class="fas fa-trash" style="color:red;"></i></a>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script> -->
@endsection