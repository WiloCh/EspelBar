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
            <h5 class="font-weight-bold">Bares Disponibles</h5>
            @foreach($bares as $bar)
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="align-middle">Nombre</th>                                
                    <th class="align-middle">Estado</th>                
                    <th class="align-middle">Campus</th>
                </tr>
                <tr>    
                    <td class="align-middle">{{$bar->nombre}}</td>                
                    <td class="align-middle">
                        @if ($bar->abierto==1)
                            {{'Abierto'}}
                        @endif 
                    </td>
                    @foreach($campus as $campus)
                        @if (strcmp($bar->campus_id, $campus->id) === 0)
                            <td class="align-middle">
                            {{$campus->nombre}}
                            </td>  
                        @endif 
                    
                    @endforeach              
                </tr> 
            </table>
            @endforeach
        </div>
    </div>
    <br>
    <br>
</div>
@endsection