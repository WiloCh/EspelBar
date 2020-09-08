@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Rol </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{route('roles.update',$role['id'])}}" novalidate>
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="role_name">Role name</label>
                    <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..."
                        value="{{$role->name}}" required>
                </div>
                <div class="form-group">
                    <label for="role_slug">Role Slug</label>
                    <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug"
                        placeholder="Role Slug..." value="{{$role->slug}}" required>
                </div>
                <div class="form-group">
                    <label for="roles_permissions">Add Permissions</label>
                    <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control"
                        id="roles_permissions" 
                        value="@foreach ($role->permissions as $permission)
                                {{$permission->name. ","}}
                               @endforeach" required>
                </div>

                <div class="form-group pt-2">
                    <a href="{{route('roles.index')}}" class="btn btn-primary">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Grabar">
                </div>
            </form>
        </div>
    </div>
</div>

@section('css_role_page')
    <link href="{{ asset('css//admin/bootstrap-tagsinput.css') }}" rel="stylesheet">
@endsection

@section('js_role_page')
    <script src="{{ asset('js/admin/bootstrap-tagsinput.js') }}" defer></script>

    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
        
    </script>
@endsection

@endsection