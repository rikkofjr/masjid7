@extends('layouts.startbootstrap')

@section('TitleBar')
    Tambah Data Jamaah
@endsection

@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


@endsection

@section('TitleBox')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">Tambah Data Jamaah</h1>
    </div>
@endsection

@section('Content')

<style type="text/css">
    .outerDivFull { margin:0px; } 

.switchToggle input[type=checkbox]{height: 0; width: 0; visibility: hidden; position: absolute; }
.switchToggle label {cursor: pointer; text-indent: -9999px; width: 300px; max-width: 300px; height: 30px; background: #d1d1d1; display: block; border-radius: 100px; position: relative; }
.switchToggle label:after {content: ''; position: absolute; top: 2px; left: 2px; width: 30px; height: 26px; background: #fff; border-radius: 90px; transition: 0.3s; }
.switchToggle input:checked + label, .switchToggle input:checked + input + label  {background: #3e98d3; }
.switchToggle input + label:before, .switchToggle input + input + label:before {content: 'Tidak Disaksikan'; position: absolute; top: 5px; left: 35px; width: 1220px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:before, .switchToggle input:checked + input + label:before {content: 'Disaksikan'; position: absolute; top: 5px; left: 10px; width: 130px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:after, .switchToggle input:checked + input + label:after {left: calc(100% - 2px); transform: translateX(-100%); }
.switchToggle label:active:after {width: 160px; } 
.toggle-switchArea { margin: 10px 0 10px 0; }



</style>
@if ($errors->any())
    <div class="container">      
        <div class="alert alert-danger">
            <em> {{ implode('', $errors->all(':message')) }}</em>
         </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Tambah Data Jamaah
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'alamat-jamaah.store'))}}
                <div class="form-group">
                    <div class="row">
                        <div class="col" style="text-align:center;">
                            -
                            <br/>
                            Jamaah Dalam Komplek (RW 13)
                            <br/>
                                {{ Form::radio('kategori_alamat', '1')}}
                        </div>
                        
                        <div class="col" style="text-align:center;">
                            -
                            <br/>
                            Jamaah Dalam Luar Komplek 
                            <br/>
                                {{ Form::radio('kategori_alamat', '2')}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">

                        <div class="form-group">
                            {{ Form::label('nama_pemilik', 'Nama Jamaah') }}
                            {{ Form::text('nama_pemilik', '', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('alamat', 'Alamat') }}
                            {{ Form::textarea('alamat', '', array('class' => 'form-control', 'rows' => 4)) }}
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('rt', 'RT') }}
                                    {{ Form::number('rt', '', array('class' => 'form-control', 'placeholder' => '00')) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('rw', 'RW') }}
                                    {{ Form::number('rw', '', array('class' => 'form-control', 'placeholder' => '00')) }}
                                </div>
                            </div>
                        </div>
                        
                    
                        <!--<div id="radios">
                            <label for="driving" class="material-icons">
                                <input type="radio" name="mode" id="driving" value="driving" checked/>
                                <span>
                                    <i class="fas fa-people-carry"></i></span>
                            </label>								
                            <label for="cycling" class="material-icons">
                                <input type="radio" name="mode" id="cycling" value="cycling" />
                                <span>&#xE52F;</span>
                            </label>
                            <label for="walking" class="material-icons">
                                <input type="radio" name="mode" id="walking" value="walking" />
                                <span>&#xE536;</span>
                            </label>
                        </div>--->

                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            {{ Form::label('kategori_jamaah', 'Kategori Jamaah') }}<br/>
                            <select name="kategori_jamaah" class="form-control">
                                <option value="1">Jamaah Biasa</option>
                                <option value="2">Donatur</option>
                                <option value="3">Mustahiq</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{ Form::submit('Add', array('class' => 'col-md-12 btn btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection