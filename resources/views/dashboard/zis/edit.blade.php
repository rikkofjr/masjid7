@extends('layouts.startbootstrap')
@section('TitleBar')
    Edit ZIS - {{$zis->atas_nama}}
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
                <h4>Edit ZIS - {{$zis->atas_nama}} </h4>
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
            @if(Session::has('rubah'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('rubah') !!}</em>
                </div>
            </div>
            @endif 
            {{ Form::model($zis, array('route' => array('zis.update', $zis->uuidq), 'method' => 'PUT')) }}


                <div class="form-group">
                    {{ Form::label('zis_name', 'Jenis Zakat') }}
                    {{ Form::select('zis_name', $ZisType, null, array('class'=>'form-control', 'placeholder'=>'Plih Jenis Zakat......')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('atas_nama', 'Atas Nama') }}
                    {{ Form::text('atas_nama', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nama_lain', 'Nama Lain') }}
                    {{ Form::textarea('nama_lain', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('jumlah_jiwa', 'Jumlah Jiwa') }}
                    {{ Form::number('jumlah_jiwa', null, array('class' => 'form-control')) }}
                </div>
                @if($errors->has('jumlah_jiwa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jumlah_jiwa') }}</strong>
                    </span>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h4>Uang</h4>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('uang', 'Uang Zakat Per Orang') }}
                            {{ Form::text('uang', null, array('class' => 'form-control number-form', 'id' =>'tanpa-rupiah')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uang_infaq', 'Uang Infaq') }}
                            {{ Form::text('uang_infaq', null, array('class' => 'form-control number-form', 'id' =>'tanpa-rupiah1')) }}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h4>Beras</h4>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('beras', 'Beras Zakat Per Orang') }}
                            {{ Form::number('beras', null, array(
                                'class' => 'form-control number-form', 
                                'step' => 'any'
                            )) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('beras_infaq', 'Beras Infaq') }}
                            {{ Form::number('beras_infaq', null, array('class' => 'form-control number-form')) }}
                        </div>
                    </div>
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
    <script src="{{asset ('js/calculate.js')}}"></script>
    <script>
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e)
        {
            tanpa_rupiah.value = formatRupiah(this.value);
        });

		var tanpa_rupiah1 = document.getElementById('tanpa-rupiah1');
        tanpa_rupiah1.addEventListener('keyup', function(e)
        {
            tanpa_rupiah1.value = formatRupiah(this.value);
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