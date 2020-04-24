@extends('layouts.startbootstrap')
@section('TitleBar')
    Tambah Izin Untuk Peran
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
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Permission</h4>
            </div>
            <div class="card-body">
            {{ Form::open(array('route' => 'permissions.store')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div><br>
                @if(!$roles->isEmpty()) //If no roles exist yet
                    <h4>Assign Permission to Roles</h4>

                    @foreach ($roles as $role) 
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                    @endforeach
                @endif
                <br>
                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
	</div>
</div>
@endsection