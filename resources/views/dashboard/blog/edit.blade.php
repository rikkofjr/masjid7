@extends('layouts.startbootstrap')
@section('TitleBar')
    Pengguna
@endsection
@section('Content')
<!--Row1-->

<!--Row2-->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>edit Pengguna</h4>
            </div>
            <div class="card-body">
            {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

            </div>
        </div>
	</div>

    <div class="col-md-12 col-lg-12 col-xl-6">
    @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 
        <div class="card">
            <div class="card-header">
                <h4>Edit Password</h4>
            </div>
            <div class="card-body">
            {{ Form::model($user, array('route' => array('updatepassword', $user->id), 'method' => 'PATCH')) }}{{-- Form model binding to automatically populate our fields with user data --}}

            <div class="form-group">
                {{ Form::label('password', 'Password') }}<br>
                {{ Form::password('password', array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                {{ Form::label('password', 'Confirm Password') }}<br>
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

            </div>

            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

            </div>
        </div>
	</div>
</div>
@endsection