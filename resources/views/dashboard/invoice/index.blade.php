@extends('layouts.startbootstrap')

@section('TitleBar')
	@can('Create Invoice')
    Invoice {{Auth::user()->name}}
	@endcan
	@can('Create Masjid Report')
	Invoice
	@endcan
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
            @hasrole('Jamaah')
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Invoice {{Auth::user()->name}}</h6>
            </div>
			<div class="card-body">
                <div id="kambing" class="tab-pane active">
					<br/>
					<a href="{{route('invoice-zis.create')}}" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fa fa-money-bill"></i>
                        </span>
                        <span class="text">Pembayaran</span>
                    </a>
					<div class="table-responsive">
						<table class="table table-bordered" id="tableKambing" width="100%">
							<thead>
								<tr height="50">
									<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
									<td width="20px">No</td>
									<td width="150px">Tanggal</td>
									<td>Atas Nama</td>
									<td>Jenis Tagihan</td>
									<td>Total Tagihan</td>
									<td>Status</td>
								</tr>
							</thead>
							
							<tbody>
							<?php $no = 1; ?>
							@foreach($inv as $qk)
								<tr>
									<td>{{$no++}}</td>
									<td>
										{{date('d-m-Y', strtotime($qk->created_at))}}
										
									</td>
									<td>
										{{$qk->atas_nama}}<br/>
										@if($qk->status == 3)
											Terimakasih Atas Pembayarannya
										@endif
									</td>
									<td>{{$qk->jenis_zakatt->zis_name}}</td>
									<td>{{number_format(($qk->uang_zakat * $qk->jumlah_jiwa) + $qk->uang_infaq)}}</td>
                                    <td>
                                        @if($qk->status == 0)
                                        <a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-list"></i>
                                            </span>
                                            <span class="text">Konfirmasi Pembayaran</span>
                                        </a>
                                        @endif
                                        @if($qk->status == 1)
                                        <a href="#" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-loading"></i>
                                            </span>
                                            <span class="text">Sedang Diproses</span>
                                        </a>
                                        @endif
                                        @if($qk->status == 2)
                                        <a href="#" data-toggle="modal" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-loading"></i>
                                            </span>
                                            <span class="text">Pembayaran Disetujui</span>
                                        </a>
                                        @endif
                                        @if($qk->status == 3)
                                        <a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Transaksi Selesai</span>
                                        </a>
                                        @endif
                                    </td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
            @endhasrole
            @can('Create Masjid Report')
			<div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Masuk</h6>
            </div>
			<div class="card-body">
				<div class="tabs">
					<ul class="nav nav-tabs nav-justified">
						<li class="nav-item active">
							<a href="#kambing" data-toggle="tab" class="nav-link active text-center" aria-expanded="true"> Invoice Masuk <span class="badge badge-danger">{{count($inv0)}}</span></a>
						</li>
						<li class="nav-item">
							<a href="#domba" data-toggle="tab" class=" nav-link text-center" aria-expanded="false"> Pembayaran Dikonfirmasi <span class="badge badge-danger">{{count($inv1)}}</span></a>
						</li>
						<li class="nav-item">
							<a href="#sapi" data-toggle="tab" class="nav-link text-center" aria-expanded="false">Pembayaran Disetujui</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="kambing" class="tab-pane active">
							<br/>
							<h1>Inovice Masuk</h1>
							<br/>
							<br/>
							<div class="table-responsive">
								<table class="table table-bordered" id="tableKambing" width="100%">
									<thead>
										<tr height="50">
											<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
											<td width="20px">No</td>
											<td width="150px">Tanggal</td>
											<td>Atas Nama</td>
											<td>Jenis Tagihan</td>
											<td>Total Tagihan</td>
											<td>Status</td>
										</tr>
									</thead>
									
									<tbody>
										<?php $no = 1; ?>
										@foreach($inv0 as $qk)
										<tr>
											<td>{{$no++}}</td>
											<td>
												{{date('d-m-Y', strtotime($qk->created_at))}}
												
											</td>
											<td>{{$qk->atas_nama}}</td>
											<td>{{$qk->jenis_zakatt->zis_name}}</td>
											<td>{{number_format(($qk->uang_zakat * $qk->jumlah_jiwa) + $qk->uang_infaq)}}</td>
											<td>
												@if($qk->status == 0)
												<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-danger btn-icon-split">
													<span class="icon text-white-50">
													<i class="fas fa-list"></i>
													</span>
													<span class="text">Konfirmasi Pembayaran</span>
												</a>
												@endif
												@if($qk->status == 1)
												<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-warning btn-icon-split">
													<span class="icon text-white-50">
													<i class="fas fa-loading"></i>
													</span>
													<span class="text">Sedang Diproses</span>
												</a>
												@endif
												@if($qk->status == 2)
												<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
													<span class="icon text-white-50">
													<i class="fas fa-loading"></i>
													</span>
													<span class="text">Pembayaran Disetujui</span>
												</a>
												@endif
												@if($qk->status == 3)
												<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
													<span class="icon text-white-50">
													<i class="fas fa-check"></i>
													</span>
													<span class="text">Transaksi Selesai/</span>
												</a>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div id="domba" class="tab-pane">
							<br/>
							<h1>Konfirmasi Pembayaran dari Jamaah</h1>
							<br/>
							<br/>
							<table class="table table-bordered" id="tableDomba" width="100%">
								<thead>
									<tr height="50">
										<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
										<td width="20px">No</td>
										<td width="150px">Tanggal</td>
										<td>Atas Nama</td>
										<td>Jenis Tagihan</td>
										<td>Total Tagihan</td>
										<td>Status</td>
									</tr>
								</thead>
								
								<tbody>
								<?php $no = 1; ?>
								@foreach($inv1 as $qk)
									<tr>
										<td>{{$no++}}</td>
										<td>
											{{date('d-m-Y', strtotime($qk->created_at))}}
											
										</td>
										<td>{{$qk->atas_nama}}</td>
										<td>{{$qk->jenis_zakatt->zis_name}}</td>
										<td>{{number_format(($qk->uang_zakat * $qk->jumlah_jiwa) + $qk->uang_infaq)}}</td>
										<td>
											@if($qk->status == 0)
											<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-danger btn-icon-split">
												<span class="icon text-white-50">
												<i class="fas fa-list"></i>
												</span>
												<span class="text">Konfirmasi Pembayaran</span>
											</a>
											@endif
											@if($qk->status == 1)
											<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-warning btn-icon-split">
												<span class="icon text-white-50">
												<i class="fas fa-loading"></i>
												</span>
												<span class="text">Sedang Diproses</span>
											</a>
											@endif
											@if($qk->status == 2)
											<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
												<span class="icon text-white-50">
												<i class="fas fa-loading"></i>
												</span>
												<span class="text">Pembayaran Disetujui</span>
											</a>
											@endif
											@if($qk->status == 3)
											<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
												<span class="icon text-white-50">
												<i class="fas fa-check"></i>
												</span>
												<span class="text">Transaksi Selesai/</span>
											</a>
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div id="sapi" class="tab-pane">
							<br/>
							<h1>Pembayaran Disetujui</h1>
							<br/>
							<br/>
							<table class="table table-bordered" id="tableSapi" width="100%">
								<thead>
									<tr height="50">
										<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
										<td width="20px">No</td>
										<td width="150px">Tanggal</td>
										<td>Atas Nama</td>
										<td>Jenis Tagihan</td>
										<td>Total Tagihan</td>
										<td>Status</td>
									</tr>
								</thead>
								
								<tbody>
								<?php $no = 1; ?>
								@foreach($inv2 as $qk)
									<tr>
										<td>{{$no++}}</td>
										<td>
											{{date('d-m-Y', strtotime($qk->created_at))}}
											
										</td>
										<td>{{$qk->atas_nama}}</td>
										<td>{{$qk->jenis_zakatt->zis_name}}</td>
										<td>{{number_format(($qk->uang_zakat * $qk->jumlah_jiwa) + $qk->uang_infaq)}}</td>
										<td>
										@if($qk->status == 0)
										<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-danger btn-icon-split">
											<span class="icon text-white-50">
											<i class="fas fa-list"></i>
											</span>
											<span class="text">Konfirmasi Pembayaran</span>
										</a>
										@endif
										@if($qk->status == 1)
										<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-warning btn-icon-split">
											<span class="icon text-white-50">
											<i class="fas fa-loading"></i>
											</span>
											<span class="text">Sedang Diproses</span>
										</a>
										@endif
										@if($qk->status == 2)
										<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
											<span class="icon text-white-50">
											<i class="fas fa-loading"></i>
											</span>
											<span class="text">Pembayaran Disetujui</span>
										</a>
										@endif
										@if($qk->status == 3)
										<a href="{{route('invoice-zis.show', $qk->uuid)}}" class="btn btn-success btn-icon-split">
											<span class="icon text-white-50">
											<i class="fas fa-check"></i>
											</span>
											<span class="text">Transaksi Selesai/</span>
										</a>
										@endif
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
            @endcan
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

