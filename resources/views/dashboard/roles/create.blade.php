@extends('layouts.startbootstrap')
@section('TitleBar')
    Pengguna
@endsection
@section('Content')
<!--Row1-->

<!--Row2-->

@if ($errors->any())
    <div class="container">      
        <div class="alert alert-success">
            <em> {{ implode('', $errors->all(':message')) }}</em>
         </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Peran</h4>
            </div>
            <div class="card-body">
            {{ Form::open(array('route' => 'roles.store')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <h5><b>Assign Permissions</b></h5>

            <div class='form-group'>
                @foreach ($permissions as $permission)
                    {{ Form::checkbox('permissions[]',  $permission->id ) }}
                    {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
            </div>

            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

            </div>
        </div>
	</div>
</div>
@endsection