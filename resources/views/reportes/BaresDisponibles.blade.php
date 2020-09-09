@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col">
            <h5>Bares Disponibles</h5>
            @foreach($bares as $bar)
            <table class="table table-dark">
                <tr>
                    <th>Nombre</th>                                
                    <th>Estado</th>                
                    <th>Campus</th>
                </tr>
                <tr>    
                    <td>{{$bar->nombre}}</td>                
                    <td>{{$bar->abierto}}</td>                
                </tr> 
            </table>
            @endforeach
        </div>
    </div>
    <br>
    <br>
</div>
@endsection