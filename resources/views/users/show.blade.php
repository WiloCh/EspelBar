@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver User</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('users.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Name</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$user->name}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$user->email}}">
        </div>
                                                <div class="form-group">
            <label class="col-form-label" for="value">Password</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$user->password}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Remember Token</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$user->remember_token}}">
        </div>
                                                    </div>

    </div>
</div>
@endsection