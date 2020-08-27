@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Menu</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('menus.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
        <div class="form-group">
            <label class="col-form-label" for="value">Bar</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$menu->bar->nombre}}">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="value">Nombre del Menu</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$menu->nombre}}">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="value">Precio</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$menu->precio}}">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="value">Disponible</label>
            <span type="text" readonly class="form-control" id="staticEmail">
                @if ($menu->disponible==1)
                    {{'Si'}}
                @endif 
                @if ($menu->disponible==0)
                    {{'No'}}
                @endif
            </span>
        </div>
        <div class="form-group">
            <label class="col-form-label" for="value">Descripcion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$menu->descripcion}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection