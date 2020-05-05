@extends('layouts.startbootstrap')

@section('TitleBar')
    Data Jamaah
@endsection

@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

@endsection

@section('TitleBox')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
@endsection

@section('Content')
<!--Row1-->
<style type="text/css">
    .number-form{
        text-align:right;
    }
</style>
<!--Row2-->
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jamaah</h6>
            </div>
			<div class="card-body">
			<a href="{{route('alamat-jamaah.create')}}" class="btn btn-primary">Tambah Data</a>

				<div class="tabs">
					<ul class="nav nav-tabs nav-justified">
						<li class="nav-item active">
							<a href="#internal" data-toggle="tab" class="nav-link active text-center" aria-expanded="true"><i class="fa fa-money"></i> internal</a>
						</li>
						<li class="nav-item">
							<a href="#external" data-toggle="tab" class=" nav-link text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> external</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="internal" class="tab-pane active">
							<br/>
							<h1>Jamaah Dalam Komplek</h1>
							<br/>
							<br/>
							<div class="table-responsive">
								<table class="table table-bordered" id="tableinternal" width="100%">
									<thead>
										<tr height="50">
											<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
											<td width="20px">No</td>
											<td width="150px">Nama Pemilik</td>
											<td>Alamat</td>
											<td>RT</td>
											<td>RW</td>
											<td>Jumlah</td>
											<td>keterangan</td>
										</tr>
									</thead>
									
									<tbody>
									<?php $no = 1; ?>
									@foreach($alamatJamaahInternal as $qk)
										<tr class="">
											<td>{{$no++}}</td>
											<td><a href="{{route('alamat-jamaah.show', $qk->id)}}">{{$qk->nama_pemilik}}</a></td>
											<td>{{$qk->alamat}}</td>
											<td>{{$qk->rt}}</td>
											<td>{{$qk->rw}}</td>
											<td>{{$qk->anggota_keluarga_count}}</td>
											<td>
												@if($qk->kategori_jamaah == 1) 
													Jamaah Biasa 
												@elseif($qk->kategori_jamaah == 2)
													Donatur		
												@else
													Mustahiq				
												@endif
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div id="external" class="tab-pane">
							<br/>
							<h1>Jamaah Luar Komplek</h1>
							<br/>
							<br/>
							<div class="table-responsive">
								<table class="table table-bordered" id="tableexternal" width="100%">
									<thead>
										<tr height="50">
											<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
											<td width="20px">No</td>
											<td width="150px">Nama Pemilik</td>
											<td>Alamat</td>
											<td>RT</td>
											<td>RW</td>
											<td>Jumlah</td>
											<td>keterangan</td>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										@foreach($alamatJamaahExternal as $qk)
											<tr class="">
												<td>{{$no++}}</td>
												<td><a href="{{route('alamat-jamaah.show', $qk->id)}}">{{$qk->nama_pemilik}}</a></td>
												<td>{{$qk->alamat}}</td>
												<td>{{$qk->rt}}</td>
												<td>{{$qk->rw}}</td>
												<td>{{$qk->anggota_keluarga_count}}</td>
												<td>{{$qk->kategori_jamaah}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('DynamicScript')
		<!-- Specific Page Vendor -->
		<script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script>
			$(document).ready( function () {
				$('#tableinternal').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableexternal').DataTable();
			} );
		</script>
        
@endsection

