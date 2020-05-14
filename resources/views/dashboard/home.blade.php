@extends('layouts.startbootstrap')
@section('TitleBar')
    Dashboard - Sistem Informasi Masjid
@endsection

@section('Content')
<!--Row1-->

<!--Row2-->
<style type="text/css">
    .number-form{
        text-align:right;
    }
</style>
@can('Create Masjid Report' || 'Announcer')
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jamaah Tercatat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($totalJamaah)}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pemasukan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{number_format($totalKasPenerimaan)}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengeluaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{number_format($totalKasPengeluaran)}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Masjid</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{number_format($totalKasPenerimaan - $totalKasPengeluaran)}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12 py-2">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Pemasukan</h4>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
	</div>
    <div class="col-lg-6 col-md-12 py-2">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Pengeluaran</h4>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="Chart2"></canvas>
                </div>
            </div>
        </div>
	</div>
</div>
@endcan
@can('Create Invoice')
<x-createInvoice/>
@endcan
@endsection
@section('DynamicScript')
<script src="{{asset ('startbootstrap/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset ('startbootstrap/js/demo/chart-area-demo.js')}}"></script>
<script>
var url = "{{route('freeJsonDataKasPenerimaanTahunan')}}"
var Labelnya = new Array();
var Datanya = new Array();
$(document).ready(function(){
  $.get(url, function(response){
    response.forEach(function(data){
        Labelnya.push(data.tahunPenerimaanKas);
        Datanya.push(data.totalPenerimaan);
    });
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: Labelnya,
        datasets: [{
          label: "Total",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: Datanya,
        }],
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
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp' + number_format(value);
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
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  });
});
</script>
<script>
  var urlpengeluaran = "{{route('freeJsonDataKasPengeluaranTahunan')}}"
  var TahunPengeluaran = new Array();
  var TotalPengeluaran = new Array();
  $(document).ready(function(){
    $.get(urlpengeluaran, function(response){
      response.forEach(function(data){
          TahunPengeluaran.push(data.tahunPengeluaranKas);
          TotalPengeluaran.push(data.totalPengeluaran);
      });
      var ctx2 = document.getElementById("Chart2");
      var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
          labels: TahunPengeluaran,
          datasets: [{
            label: "Earnings",
            lineTension: 0.3,
            backgroundColor: "rgb(246,126,125,0.1)",
            borderColor: "rgb(255,0,0)",
            pointRadius: 3,
            pointBackgroundColor: "rgb(237,37,40)",
            pointBorderColor: "rgb(237,37,40)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgb(237,37,40)",
            pointHoverBorderColor: "rgb(237,37,40)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: TotalPengeluaran,
          }],
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
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return 'Rp' + number_format(value);
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
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    });
  });
</script>
@endsection