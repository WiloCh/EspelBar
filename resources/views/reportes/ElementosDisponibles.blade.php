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
            <h5 class="font-weight-bold">Menus Disponibles</h5>
            
            <table  class="table table-striped table-bordered">
                <tr>
                    <th class="align-middle">Nombre</th>                                
                    <th class="align-middle">Estado</th>                
                    <th class="align-middle">Precio</th>
                </tr>
                @foreach($menus as $menu)
                    <tr>    
                        <td class="align-middle">{{$menu->nombre}}</td>                
                        <td class="align-middle">
                            @if ($menu->disponible==1)
                                {{'Disponible'}}
                            @endif 
                        </td>     
                        <td class="align-middle">{{$menu->precio}}</td>           
                    </tr> 
                @endforeach
            </table>
            
        </div>
        <div class="col">
            <h5 class="font-weight-bold">Snacks Disponibles</h5>
            <table  class="table table-striped table-bordered">
                <tr>
                    <th class="align-middle">Nombre</th>                                
                    <th class="align-middle">Estado</th>                
                    <th class="align-middle">Precio</th>
                </tr>
                @foreach($snacks as $snack)
                    <tr>    
                        <td class="align-middle">{{$snack->nombre}}</td>                
                        <td class="align-middle">
                            @if ($snack->disponible==1)
                                {{'Disponible'}}
                            @endif 
                        </td>    
                        <td class="align-middle">{{$snack->precio}}</td>           
                    </tr> 
                @endforeach
            </table>
           
        </div>
    </div>
    <br>
    <br>
</div>
@endsection