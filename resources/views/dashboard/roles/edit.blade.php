@extends('layouts.startbootstrap')
@section('TitleBar')
    Pengguna
@endsection
@section('Content')
<!--Row1-->

<!--Row2-->
@if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 
<div class="row">
    <div class='col-lg-12 col-lg-offset-4'>
        <div class="card">
            <div class="card-header">
                <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
            </div>
            <div class="card-body">
                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}    
            </div>
        </div>
    </div>
</div>
@endsection