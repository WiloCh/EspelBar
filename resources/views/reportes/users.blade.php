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
            @foreach($users as $user)
            <h5>{{$user->name}}</h5>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Email</th>                                
                    <th>Fecha Creado</th>                
                    <th>Fecha Actualizado</th>
                </tr>
                <tr>    
                    <td>{{$user->email}}</td>                
                    <td>{{$user->created_at}}</td>                
                    <td>{{$user->updated_at}}</td>
                </tr> 
            </table>
            @endforeach
        </div>
    </div>
    <br>
    <br>
</div>
@endsection