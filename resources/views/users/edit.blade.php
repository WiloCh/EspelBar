@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar User </h3>
        </div>
        <div class="card-body">

            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>

            @endif

            <form action="{{route('users.update',['user'=>$user->id])}}" method="POST" novalidate>
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control String" type="text" name="name" id="name"
                        value="{{old('name',$user->name)}}" required="required">
                    @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control String" type="text" name="email" id="email"
                        value="{{old('email',$user->email)}}" required="required">
                    @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email_verified_at">Email Verified At</label>
                    <input class="form-control DateTime" type="text" name="email_verified_at" id="email_verified_at"
                        value="{{old('email_verified_at',$user->email_verified_at)}}">
                    @if($errors->has('email_verified_at'))
                    <p class="text-danger">{{$errors->first('email_verified_at')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control String" type="text" name="password" id="password"
                        value="{{old('password',$user->password)}}" required="required">
                    @if($errors->has('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="remember_token">Remember Token</label>
                    <input class="form-control String" type="text" name="remember_token" id="remember_token"
                        value="{{old('remember_token',$user->remember_token)}}">
                    @if($errors->has('remember_token'))
                    <p class="text-danger">{{$errors->first('remember_token')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select class="role form-control" name="role" id="role">
                        <option value="">Select Role...</option>
                        @foreach ($roles as $role)
                            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->roles->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>                
                        @endforeach
                    </select>          
                </div>
                <div class="form-group">
                    <div id="permissions_box" >
                        <label for="roles">Select Permissions</label>        
                        <div id="permissions_ckeckbox_list">                    
                        </div>
                    </div>
                </div>

                @if($user->permissions->isNotEmpty())
                    @if($rolePermissions != null)
                        <div id="user_permissions_box" >
                            <label for="roles">User Permissions</label>
                            <div id="user_permissions_ckeckbox_list">                    
                                @foreach ($rolePermissions as $permission)
                                <div class="custom-control custom-checkbox">                         
                                    <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Grabar</button>
                    <a href="{{route('users.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    </div>

</div>

@section('js_user_page')
    <script>
        $(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            var user_permissions_box = $('#user_permissions_box');
            var user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes
            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                permissions_ckeckbox_list.empty();
                user_permissions_box.empty();
                $.ajax({
                    url: "http://localhost/EspelBar/public/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    
                    console.log(data);
                    
                    permissions_box.show();                        
                    // permissions_ckeckbox_list.empty();
                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(       
                            '<div class="custom-control custom-checkbox">'+                         
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });
    </script>

@endsection

@endsection