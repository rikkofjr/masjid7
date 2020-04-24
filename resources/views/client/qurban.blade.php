@extends('layouts.lawncare')
@section('TitleBar')
    Penerimaan Hewan Qurban Tahun {{$nowHijri}}
@endsection
@section('Content')
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
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('lawncare/images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Penerimaan Hewan Qurban Tahun {{$nowHijri}}</h1>
                </div>
            </div>
        </div>
    </section>
   	
	<section class="ftco-section bg-light">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="card p-2">
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
                                    Keterangan :<br/>
                                    <span style="padding:2px 5px;background-color:#dc3545;">&nbsp&nbsp</span> Disaksikan
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tableKambing" width="100%">
                                            <thead>
                                                <tr height="50">
                                                    <!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
                                                    <td width="20px">No</td>
                                                    <td width="150px">Tanggal</td>
                                                    <td>Atas nama</td>
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
    </section>
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