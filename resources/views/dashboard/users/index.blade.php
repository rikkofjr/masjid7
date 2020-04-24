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
				    			<th>#</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Nomor Handphone</th>
								<th>Peran</th>
					    		<th>act</th>
							</tr>
						</thead>
						<tbody>
					    	<tr>
						    	<td>1</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
								<td class="actions-hover actions-fade">
									<a href=""><i class="fa fa-pencil"></i></a>
						    		<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
					    	<tr>
						    	<td>2</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
								<td class="actions-hover actions-fade">
									<a href=""><i class="fa fa-pencil"></i></a>
						    		<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
					    	<tr>
						    	<td>3</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
								<td class="actions-hover actions-fade">
									<a href=""><i class="fa fa-pencil"></i></a>
						    		<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection