@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Crear Rol </h3>
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

            <form method="POST" action="{{route('roles.store')}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="role_name">Role name</label>
                    <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..."
                        value="{{ old('role_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="role_slug">Role Slug</label>
                    <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug"
                        placeholder="Role Slug..." value="{{ old('role_slug') }}" required>
                </div>
                <div class="form-group">
                    <label for="roles_permissions">Add Permissions</label>
                    <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control"
                        id="roles_permissions" value="{{ old('roles_permissions') }}">
                </div>

                <div class="form-group pt-2">
                    <a href="{{route('roles.index')}}" class="btn btn-primary">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection