@extends('layouts.startbootstrap')
@section('TitleBar')
    Pengguna
@endsection
@section('Content')
<!--Row1-->
<!--Row2-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Pengguna</h4>
            </div>
            <div class="card-body">
                <a href="{{route ('users.create') }}" class="btn btn-primary">Tambah Pengguna <i class="fa fa-plus"></i></a>
                <br/>
                <br/>
                <div class="table-responsive">
					<table class="table mb-none">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Nomor Handphone</th>
								<th>Peran</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
					    	<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->username}}</td>
								<td>{{$user->roles->pluck('name')}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection