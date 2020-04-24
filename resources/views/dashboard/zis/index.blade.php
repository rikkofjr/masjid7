@extends('layouts.startbootstrap')
@section('TitleBar')
    Laporan ZIS Tahun {{$nowHijri}}H / {{$nowMasehi}}M
@endsection
@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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
	<div class="col-md-12 col-sm-12">
		<div class="card p-2">
			<div class="tabs">
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li class="nav-item active">
						<a href="#fitrah" data-toggle="tab" class="nav-link text-center" aria-expanded="true"><i class="fa fa-money"></i> Fitrah</a>
					</li>
					<li class="nav-item">
						<a href="#mall" data-toggle="tab" class="nav-link text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Mall</a>
					</li>
					<li class="nav-item">
						<a href="#fidyah" data-toggle="tab" class=" nav-link text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Fidyah</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="fitrah" class="tab-pane active table-responsive">
						<br/>
						<h1>Zakat Fitrah</h1>
						<br/>
						<br/>
						<table class="table table-bordered table-striped" id="datatable-ajax">
							<thead>
								<tr height="50">
									<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
									<td rowspan="2" name="created_at">Tanggal</td>
									<td rowspan="2" name="atas_nama">Nama</td>
									<td colspan="2">Uang</td>
									<td colspan="2">Beras</td>
									<td rowspan="2" name="jumlah_jiwa">Jiwa</td>
								</tr>
								<tr height="50">
									<td name="uang">Zakat</td>
									<td name="uang_infaq">Infaq</td>
									<td name="beras">Zakat</td>
									<td name="beras_infaq">Infaq</td>
								</tr>
							</thead>
							
							<tbody>
							</tbody>
							<tfoot>
								<td colspan="2"><b>Total Keseluruhan</b></td>
								<td>{{number_format($jumlahUangZakatFitrahTahunIni)}}</td>
								<td>{{number_format($jumlahUangInfaqFitrahTahunIni)}}</td>
								<td>{{number_format($jumlahBerasZakatFitrahTahunIni,2,'.','')}}</td>
								<td>{{number_format($jumlahBerasInfaqFitrahTahunIni,2,'.','')}}</td>
								<td>{{number_format($jumlahJiwaFitrahTahunIni)}}</td>
							</tfoot>
						</table>
					</div>
					<div id="mall" class="tab-pane table-responsive">
						<!--Table zakat mall-->
						<br/>
						<h1>Zakat Mall</h1>
						<br/>
						<br/>
						<table class="table table-bordered table-striped" id="zakatmall" width="100%">
							<thead>
								<tr height="50">
									<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
									<td rowspan="2" name="created_at">Tanggal</td>
									<td rowspan="2" name="atas_nama">Nama</td>
									<td colspan="2">Uang</td>
									<td colspan="2">Beras</td>
									<td rowspan="2" name="jumlah_jiwa">Jiwa</td>
								</tr>
								<tr height="50">
									<td name="uang">Zakat</td>
									<td name="uang_infaq">Infaq</td>
									<td name="beras">Zakat</td>
									<td name="beras_infaq">Infaq</td>
								</tr>
							</thead>
							
							<tbody>
							</tbody>
							<tfoot>
								<td colspan="2"><b>Total Keseluruhan</b></td>
								<td>{{number_format($jumlahUangZakatMallTahunIni)}}</td>
								<td>{{number_format($jumlahUangInfaqMallTahunIni)}}</td>
								<td>{{number_format($jumlahBerasZakatMallTahunIni,2,'.','')}}</td>
								<td>{{number_format($jumlahBerasInfaqMallTahunIni,2,'.','')}}</td>
								<td></td>
							</tfoot>
						</table>
					</div>
					<div id="fidyah" class="tab-pane table-responsive">
						<br/>
						<h1>Zakat Fidyah</h1>
						<br/>
						<br/>
						<table class="table table-bordered table-striped" id="zakatfidyah" width="100%">
							<thead>
								<tr height="50">
									<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
									<td rowspan="2" name="created_at">Tanggal</td>
									<td rowspan="2" name="atas_nama">Nama</td>
									<td colspan="2">Uang</td>
									<td colspan="2">Beras</td>
									<td rowspan="2" name="jumlah_jiwa">Jiwa</td>
								</tr>
								<tr height="50">
									<td name="uang">Zakat</td>
									<td name="uang_infaq">Infaq</td>
									<td name="beras">Zakat</td>
									<td name="beras_infaq">Infaq</td>
								</tr>
							</thead>
							
							<tbody>
							</tbody>
							<tfoot>
								<td colspan="2"><b>Total Keseluruhan</b></td>
								<td>{{number_format($jumlahUangZakatFidyahTahunIni)}}</td>
								<td>{{number_format($jumlahUangInfaqFidyahTahunIni)}}</td>
								<td>{{number_format($jumlahBerasZakatFidyahTahunIni,2,'.','')}}</td>
								<td>{{number_format($jumlahBerasInfaqFidyahTahunIni,2,'.','')}}</td>
								<td></td>
							</tfoot>
						</table>
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
			$(function() {
				$('#datatable-ajax').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{route('jsonFitrahDataThisYear')}}",
					columns: [
                        //{ data: 'DT_RowIndex', name:'DT_RowIndex',seacrhable:false, orderable:false},
                        { data: 'created_at', name: 'created_at' },
                        { data: 'atas_nama', name: 'atas_nama'},
						{ data: 'uang', name: 'uang', className:'text-right' },
						{ data: 'uang_infaq', name: 'uang_infaq', className:'text-right'},
						{ data: 'beras', name: 'beras', className:'text-right' },
						{ data: 'beras_infaq', name: 'beras_infaq', className:'text-right' },
                        { data: 'jumlah_jiwa', name: 'jumlah_jiwa', className:'text-center',seacrhable:true,orderable:false},
					]
				});
				$('#zakatmall').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{route('jsonMallDataThisYear')}}",
					columns: [
                        //{ data: 'DT_RowIndex', name:'DT_RowIndex',seacrhable:false, orderable:false},
                        { data: 'created_at', name: 'created_at' },
                        { data: 'atas_nama', name: 'atas_nama'},
						{ data: 'uang', name: 'uang', className:'text-right' },
						{ data: 'uang_infaq', name: 'uang_infaq', className:'text-right'},
						{ data: 'beras', name: 'beras' , className:'text-right'},
						{ data: 'beras_infaq', name: 'beras_infaq' , className:'text-right'},
                        { data: 'jumlah_jiwa', name: 'jumlah_jiwa', seacrhable:true,orderable:false},
					]
				});
				$('#zakatfidyah').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{route('jsonFidyahDataThisYear')}}",
					columns: [
                        //{ data: 'DT_RowIndex', name:'DT_RowIndex',seacrhable:false, orderable:false},
                        { data: 'created_at', name: 'created_at' },
                        { data: 'atas_nama', name: 'atas_nama'},
						{ data: 'uang', name: 'uang' , className:'text-right'},
						{ data: 'uang_infaq', name: 'uang_infaq', className:'text-right'},
						{ data: 'beras', name: 'beras' , className:'text-right'},
						{ data: 'beras_infaq', name: 'beras_infaq', className:'text-right' },
                        { data: 'jumlah_jiwa', name: 'jumlah_jiwa', seacrhable:true,orderable:false},
					]
				});
			});
			</script>
@endsection

