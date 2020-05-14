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
                    {{ Form::select('zis_name', $ZisType, null, array('class'=>'form-control', 'placeholder'=>'Plih Jenis Pembayaran......')) }}
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