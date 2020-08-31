@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Rol</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px">
                    <a href="{{route('roles.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5>Name: {{$role['name']}}</h5>
            <h5>Slug: {{$role['slug']}}</h5>
            <h5 class="card-title">Permissions</h5>
            <p class="card-text">
                ...........
            </p>
        </div>
    </div>
</div>
@endsection