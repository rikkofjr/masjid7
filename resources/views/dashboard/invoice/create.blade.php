@extends('layouts.startbootstrap')
@section('TitleBar')
    Zakat Infaq & Shadaqoh
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
                <h4>Zakat Infaq & Shadaqoh - {{$todayHijri}}</h4>
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
            {{ Form::open(array('route' => 'invoice-zis.store'))}}


                <div class="form-group">
                    {{ Form::label('zis_name', 'Jenis Zakat') }}
                    {{ Form::select('zis_name', $ZisType, null, array('class'=>'form-control', 'placeholder'=>'Plih Jenis Zakat......')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('atas_nama', 'Atas Nama') }}
                    {{ Form::text('atas_nama', Auth::user()->name, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nama_lain', 'Nama Lain') }}
                    {{ Form::textarea('nama_lain', '', array('class' => 'form-control')) }}
                </div>

                <div class="row">
                    <div class="col-lg-8 col-7">
                        <div class="form-group">
                            {{ Form::label('uang', 'Zakat Per Jiwa*') }}
                            {{ Form::number('uang', '45000', array('class' => 'form-control number-form', 'id' => 'txt2', 'min' => '45000')) }}
                            <small>min 45.000,-</small>
                        </div>
                    </div>
                    <div class="col-lg-4 col-5">
                        <div class="form-group">
                            {{ Form::label('jumlah_jiwa', 'Jumlah Jiwa*') }}
                            {{ Form::number('jumlah_jiwa', '1', array('class' => 'form-control', 'min' => '1')) }}
                        </div>
                        @if($errors->has('jumlah_jiwa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_jiwa') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('uang_infaq', 'Uang Infaq') }}
                            {{ Form::text('uang_infaq', '', array('class' => 'form-control number-form')) }}
                            <small>Boleh dikosongkan</small>
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
    <!--<script src="{{asset ('js/calculate.js')}}"></script>-->
    <script type="text/javascript">
		// var tanpa_rupiah = document.getElementById('txt4');
        // tanpa_rupiah.addEventListener('keyup', function(e)
        // {
        //     tanpa_rupiah.value = formatRupiah(this.value);
        // });

		// var tanpa_rupiah1 = document.getElementById('tanpa-rupiah1');
        // tanpa_rupiah1.addEventListener('keyup', function(e)
        // {
        //     tanpa_rupiah1.value = formatRupiah(this.value);
        // });
		
       
	
	// /* Fungsi */
	// function formatRupiah(angka, prefix)
	// {
	// 	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	// 		split	= number_string.split(','),
	// 		sisa 	= split[0].length % 3,
	// 		rupiah 	= split[0].substr(0, sisa),
	// 		ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
	// 	if (ribuan) {
	// 		separator = sisa ? '.' : '';
	// 		rupiah += separator + ribuan.join('.');
	// 	}
		
	// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	// }
    

    </script>
    
@endsection