@extends('layouts.startbootstrap')
@section('TitleBar')
    Rubah Data - {{$pengumuman->judul_pengumuman}}
@endsection

@section('Content')
<!--Row1-->

<!--Row2-->
<style type="text/css">
    .number-form{
        text-align:right;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Rubah Data - {{$pengumuman->judul_pengumuman}}</h4>
            </div>
            <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('Succsess'))
            <div class="alert alert-success"><em> {!! session('Succsess') !!}</em></div>
             @endif 
            {{ Form::model($pengumuman, array('route' => array('pengumuman.update', $pengumuman->uuid), 'method' => 'PUT')) }}


                <div class="form-group">
                    {{ Form::label('judul_pengumuman', 'Judul Pengumuman') }}
                    {{ Form::text('judul_pengumuman', null, array('class'=>'form-control')) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('deskripsi', 'Deskripsi') }}
                    {{ Form::textarea('deskripsi', null, array('class' => 'form-control')) }}
                </div>
 
                <br/>

                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
	</div>
</div>
@endsection
@section('DynamicScript')
    <!--<script src="{{asset ('js/calculate.js')}}"></script>-->
    <script type="text/javascript">
		var tanpa_rupiah = document.getElementById('tanpa-rupiah');
	tanpa_rupiah.addEventListener('keyup', function(e)
	{
		tanpa_rupiah.value = formatRupiah(this.value);
	});
	
	
	/* Fungsi */
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
    </script>
    
@endsection