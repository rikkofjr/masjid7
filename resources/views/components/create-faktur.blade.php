<div class="row" style="margin-top:10px;">
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
            {{ Form::model($zis, array('route' => array('invoiceStoreToZis', $zis->uuid), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

                <div class="form-group">
                    {{ Form::label('zis_name', 'Jenis Zakat') }}
                    {{ Form::select('zis_name', $ZisType, $zis->jenis_zakat, array('class'=>'form-control', 'placeholder'=>'Plih Jenis Zakat......')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('atas_nama', 'Atas Nama') }}
                    {{ Form::text('atas_nama', $zis->atas_nama, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nama_lain', 'Nama Lain') }}
                    {{ Form::textarea('nama_lain', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('jumlah_jiwa', 'Jumlah Jiwa') }}
                    {{ Form::number('jumlah_jiwa', $zis->jumlah_jiwa, array('class' => 'form-control')) }}
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                        <h4>Uang</h4>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('uang', 'Total Uang Zakat') }}
                            {{ Form::text('uang', $zis->uang_zakat * $zis->jumlah_jiwa, array('class' => 'form-control number-form', 'id' =>'tanpa-rupiah')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('uang_infaq', 'Uang Infaq') }}
                            {{ Form::text('uang_infaq', $zis->uang_infaq, array('class' => 'form-control number-form tanpa-rupiah', 'id' =>'tanpa-rupiah1')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Beras</h4>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('beras', 'Total Uang Fitrah')}}
                            {{ Form::number('beras', '', array(
                                'class' => 'form-control number-form', 
                                'step' => 'any'
                            )) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('beras_infaq', 'Beras Infaq') }}
                            {{ Form::number('beras_infaq', '', array('class' => 'form-control number-form')) }}
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