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
                <h4>Tambah Pengguna</h4>
            </div>
            <div class="card-body">
            {{ Form::open(array('url' => 'users')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', '', array('class' => 'form-control')) }}
                </div>

                <div class='form-group'>
                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                    @endforeach
                </div>

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