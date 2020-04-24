@extends('layouts.startbootstrap')
@section('TitleBar')
    Arsip Laporan Qurban
@endsection
@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('octopus/vendor/morris/morris.css')}}" />

@endsection
@section('Content')
<!--Row1-->
<style type="text/css">
    .number-form{
        text-align:right;
    }
</style>
<div class="row">
    
</div>
<!--Row2-->
<div class="row">
	<div class="col-md-12 p-2">
    <div class="card">
      <div class="card-header">
          Arsip Qurban
      </div>
      <div class="card-body">
          <table class="table table-stripped">
              <tr>
                  <td>Tahun Hijriah</td>
                  <td>Sapi</td>
                  <td>Kambing</td>
                  <td>Domba</td>
              </tr>
              @foreach($qurbanArsip as $qr)
              <tr>
                  <td>{{$qr->tahunHijriah}} Hijriah</td>
                  <td>{{$qr->where('jenis_hewan', 1)->count()}}</td>
                  <td>{{number_format($qr->jenis_hewan)}}</td>
                  <td>{{$qr->totalBeras}}</td>
              </tr>
              @endforeach
          </table>
      </div>
     </div>
	</div>
</div>
<div class="row ">
	<div class="col-md-12 p-2">
		<div class="card mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
			</div>
			<div class="card-body">
				<div class="chart-bar">
					<canvas id="myBarChart"></canvas>
				</div>
			<hr>
			Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
			</div>
		</div>
	</div>

</div>
@endsection
@section('DynamicScript')
		<script src="{{asset('startbootstrap/vendor/chart.js/Chart.min.js')}}"></script>
		
@endsection

