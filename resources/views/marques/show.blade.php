@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Marques</div>

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
                            @if(Auth::user()->roles === "admin")
                                <th>Action</th>
                            @endif
                        </thead>
                        
                        <tbody>
                            @foreach ($marque as $uneMarque)
                            <tr>
                                <td>{{$uneMarque->id}}</td>
                                <td>{{$uneMarque->nom}}</td>
                                <td>
                                    <a href="{{route('formUpdateMarque', ['id' => $uneMarque->id])}}"><i class="fas fa-pen"></i></a>
                                    <a style="background-color: #fff !important; border: none !important;" href="{{route('deleteMarque', ['id' => $uneMarque->id])}}" onclick="return confirm('ATTENTION : Si vous supprimez cette marque, cela supprimera toutes les données rataché à elle. Etes vous sûre de vouloir supprimer cette marque ?');"><i class="fas fa-trash" style="color:red;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
@endsection