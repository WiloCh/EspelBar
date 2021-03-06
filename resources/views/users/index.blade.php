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
                    <h4> Users </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px">
                    <a href="{{route('users.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
            </>
            <div class="card-body">

                <table class="table table-striped">
                    @if(count($users))
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Permissions</td>
                        </tr>

                    </thead>
                    @endif
                    <tbody>
                        @forelse($users as $user)
                        @if(!\Auth::user()->hasRole('admin') && $user->hasRole('admin')) @continue; @endif
                        <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#ddd' : '' }}> 
                            <td>
                                <a href="{{route('users.show',['user'=>$user] )}}" class="btn btn-info">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </a>
                                <a href="{{route('users.edit',['user'=>$user] )}}" class="btn btn-primary">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-user-{{$user->id}}').submit();" class="btn btn-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                    </svg>
                                </a>
                                <form id="delete-user-{{$user->id}}" action="{{route('users.destroy',['user'=>$user])}}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->roles->isNotEmpty())
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-secondary">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if ($user->permissions->isNotEmpty())
                                        
                                    @foreach ($user->permissions as $permission)
                                        <span class="badge badge-secondary">
                                            {{ $permission->name }}                                    
                                        </span>
                                    @endforeach
                                    
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