@extends('layouts.startbootstrap')
@section('TitleBar')
    Arsip Laporan ZIS
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
                Arsip Zakat Fitrah
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <td rowspan="2">Tahun Hijriah</td>
                        <td colspan="2">Uang</td>
                        <td colspan="2">Beras</td>
                    </tr>
                    <tr>
                        <td>Uang</td>
                        <td>Uang Infaq</td>
                        <td>Beras</td>
                        <td>Beras Infaq</td>
                    </tr>
                    @foreach($zisFitrah as $zisFtr)
                    <tr>
                        <td>{{$zisFtr->tahunHijriah}} Hijriah</td>
                        <td>{{number_format($zisFtr->totalUang)}}</td>
                        <td>{{number_format($zisFtr->totalUangInfaq)}}</td>
                        <td>{{$zisFtr->totalBeras}}</td>
                        <td>{{$zisFtr->totalBerasInfaq}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
	</div>
    <div class="col-md-12 col-lg-12 col-xl-6 p-2">
        <div class="card">
            <div class="card-header">
				Arsip Zakat Mall
            </div>
            <div class="card-body">
				<table class="table table-stripped">
					<tr>
						<td rowspan="2">Tahun Hijriah/Masehi</td>
						<td colspan="2">Uang</td>
						<td colspan="2">Beras</td>
					</tr>
					<tr>
						<td>Uang</td>
						<td>Uang Infaq</td>
						<td>Beras</td>
						<td>Beras Infaq</td>
					</tr>
					@foreach($zisMall as $zisFtr)
					<tr>
						<td>{{$zisFtr->tahunHijriah}} Hijriah</td>
						<td>{{number_format($zisFtr->totalUang)}}</td>
						<td>{{number_format($zisFtr->totalUangInfaq)}}</td>
						<td>{{$zisFtr->totalBeras}}</td>
						<td>{{$zisFtr->totalBerasInfaq}}</td>
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
		<script>
		
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [
		@foreach($zisFitrah as $zisFtr)
		"{{$zisFtr->tahunHijriah}} Hijriah",
		@endforeach
	],
    datasets: [
		{
      		label: "Revenue",
      		backgroundColor: "#4e73df",
      		hoverBackgroundColor: "#2e59d9",
      		borderColor: "#4e73df",
      		data: [
				@foreach($zisFitrah as $zisFtr)
					{{number_format($zisFtr->totalUang)}},
				@endforeach
			  ],
		},
		{
      		label: "Revenue",
      		backgroundColor: "#1cc88a",
      		hoverBackgroundColor: "#1cc88a",
      		borderColor: "#4e73df",
      		data: [
				@foreach($zisFitrah as $zisFtr)
					{{number_format($zisFtr->totalUangInfaq)}},
				@endforeach
			  ],
		}
	],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

		</script>
@endsection

