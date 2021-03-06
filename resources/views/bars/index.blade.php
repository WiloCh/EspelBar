@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="font-weight-bold"> Bares </h4>
                </div>
                @can('create', App\Bar::class)
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('bars.create')}}" class="btn btn-success">Nuevo</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            @if(count($bars))
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <td class="font-weight-bold">Campus</td>
                    <td class="font-weight-bold">Bar</td>
                    <td class="font-weight-bold">Abierto</td>
                </tr>
            </thead>
            @endif
            <tbody>
                @forelse($bars as $bar)
                <tr>
                    <td>
                        <a href="{{route('bars.show',['bar'=>$bar] )}}" class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </a>
                        @can('edit', $bar)
                        <a href="{{route('bars.edit',['bar'=>$bar] )}}" class="btn btn-primary">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        @endcan
                        @can('delete', $bar)
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('delete-bar-{{$bar->id}}').submit();" class="btn btn-danger">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                        </a>
                        @endcan
                        <form id="delete-bar-{{$bar->id}}" action="{{route('bars.destroy',['bar'=>$bar])}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td>{{$bar->campus->nombre}}</td>
                    <td>{{$bar->nombre}}</td>
                    <td>
                        @if ($bar->abierto==1)
                            {{'Si'}}
                        @endif 
                        @if ($bar->abierto==0)
                            {{'No'}}
                        @endif
                    </td>
                                                                                                                                
                </tr>
                @empty
                <p>No Existen Datos que Mostrar...</p>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>

</div>

@endsection