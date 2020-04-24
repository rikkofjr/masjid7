@extends('layouts.octopus')
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
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="panel">
            <div class="panel-heading">
                <h4>Zakat Infaq & Shadaqoh - {{$todayHijri}}</h4>
            </div>
            <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('route' => 'zis.store'))}}


                <div class="form-group">
                    {{ Form::label('zis_name', 'Jenis Zakat') }}
                    {{ Form::select('zis_name', $ZisType, null, array('class'=>'form-control', 'placeholder'=>'Plih Jenis Zakat......')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('atas_nama', 'Atas Nama') }}
                    {{ Form::text('atas_nama', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nama_lain', 'Nama Lain') }}
                    {{ Form::textarea('nama_lain', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('jumlah_jiwa', 'Jumlah Jiwa') }}
                    {{ Form::number('jumlah_jiwa', '', array('class' => 'form-control')) }}
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
                            {{ Form::number('uang', '', array('class' => 'form-control number-form', 'id' =>'number')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uang_infaq', 'Uang Infaq') }}
                            {{ Form::number('uang_infaq', '', array('class' => 'form-control number-form')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uang_shadaqoh', 'Uang Zakat Per Orang') }}
                            {{ Form::number('uang_shadaqoh', '', array('class' => 'form-control number-form')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Beras</h4>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('beras', 'Uang Zakat Per Orang') }}
                            {{ Form::number('beras', '', array(
                                'class' => 'form-control number-form', 
                                'step' => 'any'
                            )) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('beras_infaq', 'Uang Infaq') }}
                            {{ Form::number('beras_infaq', '', array('class' => 'form-control number-form')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('beras_shadaqoh', 'Uang Zakat Per Orang') }}
                            {{ Form::number('beras_shadaqoh', '', array('class' => 'form-control number-form')) }}
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
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-6">
        <div class="panel">
            <div class="panel-heading">
                <h4>Zakat Infaq & Shadaqoh - {{$todayHijri}}</h4>
            </div>
            <div class="panel-body">
				<script>
					//harga paket dirubah menjadi array javascript 
					var cake_prices = new Array();
					@foreach($paket as $pkty)
					cake_prices["{{$pkty->id_paket}}"]={{$pkty->paket_harga}};
					@endforeach
				</script>
				{{ Form::open(array('route' => 'zis.store', 'id' => 'cakeform')) }}
					<div class="form-group">
						{{ Form::label('atas_nama', 'Nama', array('class' => 'form-control-label')) }}
						{{ Form::text('atas_nama', '', array('class' => 'form-control form-control-alternative')) }}
					</div>
					<div class="form-group">
						{{ Form::label('nohp', 'No Handphone', array('class' => 'form-control-label')) }}
						{{ Form::text('nohp', '', array('class' => 'form-control form-control-alternative')) }}
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{{ Form::label('paket', 'Pilih Paket', array('class' => 'form-control-label')) }}<br/>
								@foreach($paket as $pkt)
									<label class="form-control-label"><input type="radio"  name="selectedcake" value="{{$pkt->id_paket}}" onclick="calculateTotal()" /> {{$pkt->paket_nama }}</label><br/>
								@endforeach     
							</div>
							<br/>
						</div>
						<div class="col-md-6">
							<input id="itemtotal" name="itemtotal" type="number" onkeyup="calculateTotal()" onclick="calculateTotal()" class="form-control form-control-alternative" min="1" /><br/>
							<div id="totalPrice"></div>
							<input type="hidden" name="harga" id="hargaTotal" class="form-control form-control-alternative" readonly>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('catatan', 'catatan', array('class' => 'form-control-label')) }}
						{{ Form::textarea('catatan', '', array('class' => 'form-control form-control-alternative')) }}
					</div>
					
				{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection
@section('DynamicScript')
    <script src="{{asset ('js/calculate.js')}}"></script>
   
    
@endsection