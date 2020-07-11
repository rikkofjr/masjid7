<style type="text/css">
    h1{
        font-family:sans-serif;
        color:#000;
        font-size:30px;
        text-align:center;
    }
    .table-header{
        border-bottom:solid 1px #e3e6f0;
        font-family:sans-serif;
        margin-bottom:20px;
    }
    .table-header-data{
        background-color:#e3e6f0;
        font-family:sans-serif;
        padding:15px 0px;
        text-align:center;
    }
    .table-body{
        border-bottom:solid 1px #e3e6f0;
        font-family:sans-serif;
    }
    .badge-danger{
        background:rgba(240,63,64, 0.5);
    }

</style>
<h1>
Daftar Hewan Qurban
<br/>
@if($hewan[0]->jenis_hewan == 1)
    Kambing 
    @elseif($hewan[0]->jenis_hewan == 2)
    Domba
    @else
    Sapi
@endif - {{$todayHijri}} Hijriah 
</h1>

	<table class="table table-bordered" id="tableHewan" width="100%" cellmargin="1">
		<thead class="table-header">
			<tr height="50">
				<!--<td rowspan="2" name="DT_RowIndex" width="10px">No</td>-->
				<td width="20px" class="table-header-data">No</td>
				<td width="150px" class="table-header-data">Tanggal</td>
				<td class="table-header-data">Atas nama</td>
				<td class="table-header-data">Alamat</td>
				<td class="table-header-data">Permintaan</td>
				<td class="table-header-data">keterangan</td>
			</tr>
		</thead>
		
		<tbody valign="top">
		<?php $no = 1; ?>
		@foreach($hewan as $qk)
			<tr class="{{$qk->disaksikan === 1 ? 'badge-danger' : '' }}">
				<td class="table-body">{{$no++}}</td>
				<td class="table-body">
					{{date('d-m-Y', strtotime($qk->created_at))}}
					
				</td>
				<td class="table-body"> 
					{{$qk->atas_nama}}
					<br/>
                    {{$qk->nama_lain}}
                    <br/>
					<b>HP : {{$qk->nomor_handphone}}</b>	
				</td>
				<td class="table-body">{{$qk->alamat}}</td>
				<td class="table-body">{{$qk->permintaan}}</td>
				<td class="table-body">{{$qk->keterangan}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>