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
            <h5>Menus Disponibles</h5>
            @foreach($menus as $menu)
            <table class="table table-dark">
                <tr>
                    <th>Nombre</th>                                
                    <th>Estado</th>                
                    <th>Precio</th>
                </tr>
                <tr>    
                    <td>{{$menu->nombre}}</td>                
                    <td>{{$menu->disponible}}</td>       
                    <td>{{$menu->precio}}</td>           
                </tr> 
            </table>
            @endforeach
        </div>
        <div class="col">
            <h5>Snacks Disponibles</h5>
            @foreach($snacks as $snack)
            <table class="table table-dark">
                <tr>
                    <th>Nombre</th>                                
                    <th>Estado</th>                
                    <th>Precio</th>
                </tr>
                <tr>    
                    <td>{{$snack->nombre}}</td>                
                    <td>{{$snack->disponible}}</td>       
                    <td>{{$snack->precio}}</td>           
                </tr> 
            </table>
            @endforeach
        </div>
    </div>
    <br>
    <br>
</div>
@endsection