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
            {{ Form::model($zis, array('route' => array('zis.update', $zis->id), 'method' => 'PUT')) }}


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
                            {{ Form::number('uang', null, array('class' => 'form-control number-form', 'id' =>'number')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uang_infaq', 'Uang Infaq') }}
                            {{ Form::number('uang_infaq', null, array('class' => 'form-control number-form')) }}
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
@endsection
@section('DynamicScript')
    <script src="{{asset ('js/calculate.js')}}"></script>
   
    
@endsection