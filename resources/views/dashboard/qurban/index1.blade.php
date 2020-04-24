@extends('layouts.startbootstrap')

@section('TitleBar')
    Laporan Qurban Tahun {{$nowHijri}}H
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
                <h6 class="m-0 font-weight-bold text-primary">Laporan Qurban Tahun {{$nowHijri}}H</h6>
            </div>
			<div class="card-body">
				<div class="tabs">
					<ul class="nav nav-tabs nav-justified">
						<li class="nav-item active">
							<a href="#kambing" data-toggle="tab" class="nav-link active text-center" aria-expanded="true"><i class="fa fa-money"></i> Kambing</a>
						</li>
						<li class="nav-item">
							<a href="#domba" data-toggle="tab" class=" nav-link text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Domba</a>
						</li>
						<li class="nav-item">
							<a href="#sapi" data-toggle="tab" class="nav-link text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Sapi</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="kambing" class="tab-pane active">
							<br/>
							<h1>Penerimaan Kambing</h1>
							<br/>
							<br/>
							<div class="table-responsive">
								<table class="table table-bordered" id="tableKambing" width="100%">
									<thead>
										<tr height="50">
											<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
											<td width="20px">No</td>
											<td width="150px">Tanggal</td>
											<td>Atas nama</td>
											<td>Alamat</td>
											<td>Permintaan</td>
											<td>keterangan</td>
											<td>disaksikan</td>
										</tr>
									</thead>
									
									<tbody>
									<?php $no = 1; ?>
									@foreach($qurbanKambing as $qk)
										<tr class="{{$qk->disaksikan === 1 ? 'badge-danger' : '' }}">
											<td>{{$no++}}</td>
											<td>
												{{date('d-m-Y', strtotime($qk->created_at))}}
												
											</td>
											<td>{{$qk->atas_nama}}</td>
											<td>{{$qk->alamat}}</td>
											<td>{{$qk->permintaan}}</td>
											<td>{{$qk->keterangan}}</td>
											<td>
												{{$qk->keterangan === 1}}
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div id="domba" class="tab-pane">
							<br/>
							<h1>Penerimaan Domba</h1>
							<br/>
							<br/>
							<table class="table table-bordered" id="tableDomba" width="100%">
								<thead>
									<tr height="50">
										<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
										<td width="20px">No</td>
										<td width="150px">Tanggal</td>
										<td>Atas nama</td>
										<td>Alamat</td>
										<td>Permintaan</td>
										<td>keterangan</td>
										<td>disaksikan</td>
									</tr>
								</thead>
								
								<tbody>
								<?php $no = 1; ?>
								@foreach($qurbanDomba as $qd)
									<tr class="{{$qd->disaksikan === 1 ? 'badge-danger' : '' }}">
										<td>{{$no++}}</td>
										<td>{{date('d-m-Y', strtotime($qd->created_at))}}</td>
										<td>{{$qd->atas_nama}}</td>
										<td>{{$qd->alamat}}</td>
										<td>{{$qd->permintaan}}</td>
										<td>{{$qd->keterangan}}</td>
										<td>
											{{$qd->keterangan === 1}}
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<div id="sapi" class="tab-pane">
							<br/>
							<h1>Penerimaan Sapi</h1>
							<br/>
							<br/>
							<table class="table table-bordered" id="tableSapi" width="100%">
								<thead>
									<tr height="50">
										<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
										<td width="20px">No</td>
										<td width="150px">Tanggal</td>
										<td>Atas nama</td>
										<td>Alamat</td>
										<td>Permintaan</td>
										<td>keterangan</td>
										<td>disaksikan</td>
									</tr>
								</thead>
								
								<tbody>
								<?php $no = 1; ?>
								@foreach($qurbanSapi as $qs)
									<tr class="{{$qs->disaksikan === 1 ? 'badge-danger' : '' }}">
										<td>{{$no++}}</td>
										<td>{{date('d-m-Y', strtotime($qs->created_at))}}</td>
										<td>
											{{$qs->atas_nama}},
											{{$qs->nama_lain}}
										</td>
										<td>{{$qs->alamat}}</td>
										<td>{{$qs->permintaan}}</td>
										<td>{{$qs->keterangan}}</td>
										<td>
											{{$qs->keterangan === 1}}
										</td>
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
@endsection
@section('DynamicScript')
		<!-- Specific Page Vendor -->
		<script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script>
			$(document).ready( function () {
				$('#tableKambing').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableDomba').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableSapi').DataTable();
			} );
		</script>
        
@endsection

