@extends('layouts.octopus')
@section('TitleBar')
    Laporan ZIS Tahun {{$nowHijri}}H
@endsection
@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('octopus/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection
@section('Content')
<!--Row1-->
<style type="text/css">
    .number-form{
        text-align:right;
    }
</style>
<div class="row">
    <div class="col-md-6 col-lg-12 col-xl-6">
	    <div class="row">
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
		    			<div class="widget-summary">
			    			<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-life-ring"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
				    				<h4 class="title">Support Questions</h4>
									<div class="info">
					    				<strong class="amount">1281</strong>
											<span class="text-primary">(14 unread)</span>
									</div>
								</div>
								<div class="summary-footer">
						    		<a class="text-muted text-uppercase">(view all)</a>
								</div>
							</div>
						</div>
	        		</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
		    			<div class="widget-summary">
			    			<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-life-ring"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
				    				<h4 class="title">Support Questions</h4>
									<div class="info">
					    				<strong class="amount">1281</strong>
											<span class="text-primary">(14 unread)</span>
									</div>
								</div>
								<div class="summary-footer">
						    		<a class="text-muted text-uppercase">(view all)</a>
								</div>
							</div>
						</div>
	        		</div>
				</section>
			</div>
        </div>
    </div>
</div>
<!--Row2-->
<div class="row">
	<div class="col-md-12">
		<div class="tabs">
			<ul class="nav nav-tabs nav-justified">
				<li class="active">
					<a href="#kambing" data-toggle="tab" class="text-center" aria-expanded="true"><i class="fa fa-money"></i> Kambing</a>
				</li>
				<li class="">
					<a href="#mall" data-toggle="tab" class="text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Domba</a>
				</li>
				<li class="">
					<a href="#fidyah" data-toggle="tab" class="text-center" aria-expanded="false"><i class="fa fa-bookmark"></i> Sapi</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="kambing" class="tab-pane active">
					<br/>
					<h1>Penerimaan Kambing</h1>
					<br/>
					<br/>
					<table class="table table-bordered table-striped" id="tableKambing">
                         <thead>
                            <tr height="50">
                                <!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
                                <td width="20px">Nomor</td>
                                <td>Tanggal</td>
                                <td>Atas nama</td>
                                <td>Alamat</td>
                                <td>Permintaan</td>
                                <td>keterangan</td>
                                <td>disaksikan</td>
                            </tr>
                        </thead>
						
						<tbody>
						@foreach($qurbanKambing as $qk)
							<tr class="{{$qk->disaksikan === 1 ? 'danger' : '' }}">
								<td>{{$qk->id}}</td>
                                <td>{{date('d-m-Y', strtotime($qk->created_at))}}</td>
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
				<div id="mall" class="tab-pane">
					<!--Table zakat mall-->
					<br/>
					<h1>Zakat Mall</h1>
					<br/>
					<br/>
					<table class="table table-bordered table-striped" id="zakatmall">
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
					</table>
				</div>
				<div id="fidyah" class="tab-pane">
					<br/>
					<h1>Zakat Fidyah</h1>
					<br/>
					<br/>
					<table class="table table-bordered table-striped" id="zakatfidyah">
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
						
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<!--<a href="#" class="fa fa-times"></a>-->
				</div>

                <h4>Pengguna</h4>
            </div>
            <div class="panel-body">
                
        </div>
	</div>
</div>
@endsection
@section('DynamicScript')
		<!-- Specific Page Vendor -->
		<script src="{{asset('octopus/vendor/select2/select2.js')}}"></script>
		<script src="{{asset('octopus/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('octopus/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
        <script>
			$(document).ready( function () {
				$('#tableKambing').DataTable();
			} );
		</script>
        
@endsection

