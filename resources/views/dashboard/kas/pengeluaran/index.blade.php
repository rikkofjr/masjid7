@extends('layouts.startbootstrap')

@section('TitleBar')
    Laporan Pengeluaran Tahun
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
    @media screen and (min-width:800px){
        .dataTables_filter{
            float:right;
            margin-right:3px;
        }
    }
</style>
<!--Row2-->
@if(Session::has('edit'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('edit') !!}</em>
                </div>
            </div>
        @endif 
<div class="row">
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Pengeluaran Tahun {{$nowMasehi}}H</h6>
            </div>
			<div class="card-body">
				<div class="table-responsive">
                    <table class="table table-striped" id="kasPengeluaran">
                        <thead>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Kegiatan</td>
                            <td>Jumlah Uang</td>
                        </thead>
                        <tbody>
                        @foreach($kasPengeluaran as $kp)
                            <tr>
                                <td>1</td>
                                <td>{{$kp->created_at->format('j F, Y')}}</td>
                                <td><a href="{{route('kas-pengeluaran.edit', $kp->id)}}">{{$kp->keterangan}}</a></td>
                                <td style="text-align:right;">{{number_format($kp->pengeluaran)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Saldo</h6>
            </div>
            <div class="card-body">
                <table border="0">
                    <tr>
                        <td>Total Penerimaan</td>
                        <td>:</td>
                        <td style="text-align:right;">{{number_format($totalKasPenerimaan)}}</td>
                    </tr>
                    <tr>
                        <td>Total Pengeluaran</td>
                        <td>:</td>
                        <td style="text-align:right;">{{number_format($totalKasPengeluaran)}}</td>
                    </tr>
                    <tr>
                        <td><b>Saldo</b></td>
                        <td>:</td>
                        <td style="text-align:right;"><b>{{number_format($totalKasPenerimaan - $totalKasPengeluaran)}}</b></td>
                    </tr>
                </table>
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
				$('#kasPengeluaran').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableDomba').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableSapi').DataTable();
			} );
		</script>
        
@endsection

