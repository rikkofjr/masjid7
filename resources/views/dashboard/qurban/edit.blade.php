@extends('layouts.startbootstrap')

@section('TitleBar')
    Edit Data  Qurban Tahun {{$qurban->atas_nama}}
@endsection

@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


@endsection

@section('TitleBox')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800"></h1>
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tambah Data Penerimaan Qurban
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
                {{ Form::model($qurban, array('route' => array('qurban.update', $qurban->id), 'method' => 'PUT')) }}
                <div class="form-group">
                    <div class="row">
                        <div class="col" style="text-align:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50px" height="50px"><g><g id="Outline"><path d="M488,168a56.288,56.288,0,0,0-48.606,28.22A75.766,75.766,0,0,0,387.613,176H188l-43.2-57.6a32.069,32.069,0,0,0,6.941-5.788A32.566,32.566,0,0,0,160,90.649V88a8,8,0,0,0-8-8H132a34.189,34.189,0,0,1,28.984-16h1.892a34.412,34.412,0,0,1,27.4,13.7L201.6,92.8A8,8,0,0,0,216,88,72,72,0,0,0,72.086,84.6L18.343,138.343A8,8,0,0,0,16,144v72a8,8,0,0,0,8,8,40.045,40.045,0,0,0,40-40H90.827L160.09,337.917l7.921,150.5A8,8,0,0,0,176,496h80a8,8,0,0,0,7.589-5.47l32-96a8,8,0,0,0-.236-5.681L276.132,344H290a93.094,93.094,0,0,0,37.01,48.953l15.327,10.218-29.853,82.1A8,8,0,0,0,320,496h40a8,8,0,0,0,7.589-5.47l28.2-84.6,10.7,5.942L384.337,485.7A8,8,0,0,0,392,496h40a8,8,0,0,0,7.761-6.06l24-96a8,8,0,0,0-1.3-6.658L426.53,338.073A91.2,91.2,0,0,0,464,264.588v-12.2a76.287,76.287,0,0,0-.6-9.491A55.749,55.749,0,0,0,496,192V176A8,8,0,0,0,488,168ZM144,32a55.973,55.973,0,0,1,45.854,23.886A50.413,50.413,0,0,0,162.877,48h-1.892a50.166,50.166,0,0,0-46.821,32H88.57A56.086,56.086,0,0,1,144,32ZM32,206.629V184H48A24.042,24.042,0,0,1,32,206.629ZM224,374.975l7.585,17.7L224,423.016Zm55.449,17.38L250.234,480H226.246l21.515-86.06a8,8,0,0,0-.408-5.091L228.132,344h30.593ZM354.234,480H331.421l28.1-77.266a8,8,0,0,0-3.081-9.39l-20.556-13.7A77.151,77.151,0,0,1,306.969,344h16.2a123.1,123.1,0,0,0,48.223,48.368l10.171,5.651ZM480,192a39.835,39.835,0,0,1-27.979,38.16,8,8,0,0,0-5.416,9.332,60.723,60.723,0,0,1,1.395,12.9v12.2A75.087,75.087,0,0,1,411.062,329.1a8,8,0,0,0-2.412,11.617l38.681,52.975L425.754,480h-23l20.911-69.7a8,8,0,0,0-3.778-9.292L379.16,378.382a107.205,107.205,0,0,1-43.878-45.718l-15.854-39.635-14.856,5.942L316.184,328H224V280H208V480H183.59l-7.6-144.42a7.988,7.988,0,0,0-.694-2.863l-72-160A8,8,0,0,0,96,168H32V147.313L83.313,96H143.2a15.672,15.672,0,0,1-3.318,5.87,15.9,15.9,0,0,1-9.152,5.037,8,8,0,0,0-5.037,12.683L177.6,188.8A8,8,0,0,0,184,192H387.613a60,60,0,0,1,47.906,23.642,8,8,0,0,0,14.034-2.672A40.191,40.191,0,0,1,480,184.816Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/><rect x="72" y="120" width="16" height="16" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/></g></g> </svg>
                            <br/>
                            Kambing
                            <br/>
                                {{ Form::radio('jenis_hewan', '1')}}
                        </div>
                        
                        <div class="col" style="text-align:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50px" height="50px"><g><g id="Outline"><path d="M496,304V200a88.1,88.1,0,0,0-88-88H196L162.4,67.2A48.23,48.23,0,0,0,124,48H88A48.061,48.061,0,0,0,40.055,93.692L19.984,127.144a27.208,27.208,0,0,0-3.775,10.68A26.8,26.8,0,0,0,42.794,168H57.223l16.309,97.859A55.026,55.026,0,0,0,120.5,311.5a56.137,56.137,0,0,0,44.141,47.33L167.95,391.9l-7.888,63.108A8,8,0,0,0,168,464h32a8,8,0,0,0,7.761-6.06l16-64A7.977,7.977,0,0,0,224,392V360h16v31.192L227.111,454.4a8,8,0,0,0,7.839,9.6h32a8,8,0,0,0,7.6-5.5l21.05-64a8,8,0,0,0,.4-2.5V360h57.754l5.92,23.681L336.41,453.47A8,8,0,0,0,344,464h32a8,8,0,0,0,7.311-4.751l32-72A8.007,8.007,0,0,0,416,384v-8l7.393,9.856-15.2,68.409A8,8,0,0,0,416,464h32a8,8,0,0,0,7.59-5.47l24-72a8,8,0,0,0-.1-5.34l-10.9-29.064A56.016,56.016,0,0,0,496,304ZM42.794,152a10.8,10.8,0,0,1-10.706-12.209,11.355,11.355,0,0,1,1.616-4.415L52.53,104H112a8,8,0,0,1,0,16h-8a8,8,0,0,0-8,8,24.028,24.028,0,0,1-24,24ZM136,304a8,8,0,0,0-8-8,39.1,39.1,0,0,1-38.685-32.771L73.439,167.968A40.073,40.073,0,0,0,111.2,136h.8a24,24,0,0,0,0-48H57.013A32.057,32.057,0,0,1,88,64h36a32.151,32.151,0,0,1,25.6,12.8l36,48A8,8,0,0,0,192,128H408a72.081,72.081,0,0,1,72,72V304a40.045,40.045,0,0,1-40,40H408a40.045,40.045,0,0,1-40-40H352a55.823,55.823,0,0,0,16.861,40H247.139A55.823,55.823,0,0,0,264,304H248a40.045,40.045,0,0,1-40,40H176A40.045,40.045,0,0,1,136,304Zm72,87.016L193.754,448H177.062l6.876-55.008a7.928,7.928,0,0,0,.022-1.789L180.838,360H208Zm72-.3L261.16,448H244.746l11.093-54.4A8.031,8.031,0,0,0,256,392V360h24ZM370.8,448H355.1l20.49-61.47a8.01,8.01,0,0,0,.171-4.47L370.246,360H400v22.3Zm92.714-63.843L442.234,448H425.973l13.837-62.265a8,8,0,0,0-1.41-6.535L424,360h16a55.945,55.945,0,0,0,13.808-1.726Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/></g></g> </svg>
                            <br/>
                            Domba
                            <br/>
                                {{ Form::radio('jenis_hewan', '2')}}
                        </div>

                        <div class="col" style="text-align:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve" width="50px" height="50px" class=""><g><g>
                                <g>
                                    <rect x="68.267" y="124.244" width="17.067" height="17.067" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/>
                                </g>
                            </g><g>
                                <g>
                                    <path d="M511.377,238.377c0.418-1.024,0.623-2.108,0.623-3.2v-93.867c0-32.939-26.803-59.733-59.733-59.733H179.2v17.067h273.067    c23.526,0,42.667,19.14,42.667,42.667v92.211l-11.401,28.237c-4.173,10.317-4.173,21.683-0.009,31.983l10.906,27.145    l-31.394,102.025h-17.758l15.394-92.476c0.452-2.714-0.427-5.478-2.381-7.432l-44.723-44.723    c-7.962-7.945-12.518-18.961-12.51-30.225v-12.885h-17.067v12.885c-0.009,15.761,6.374,31.181,17.519,42.3l41.609,41.609    l-16.341,98.074c-0.41,2.475,0.29,5.001,1.911,6.921s4.002,3.021,6.511,3.021h34.133c3.746,0,7.057-2.441,8.158-6.016    l34.133-110.933c0.58-1.869,0.495-3.874-0.239-5.692l-12.041-29.969c-2.5-6.195-2.5-13.005,0-19.2L511.377,238.377z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/>
                                </g>
                            </g><g>
                                <g>
                                    <path d="M494.933,166.91v17.067c0,9.412-7.654,17.067-17.067,17.067s-17.067-7.654-17.067-17.067v-8.533    c0-18.825-15.309-34.133-34.133-34.133h-25.6v17.067h25.6c9.412,0,17.067,7.654,17.067,17.067v8.533    c0,18.825,15.309,34.133,34.133,34.133S512,202.802,512,183.977V166.91H494.933z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/>
                                </g>
                            </g><g>
                                <g>
                                    <path d="M33.536,73.044H8.533C3.823,73.044,0,76.867,0,81.577c0,16.102,2.449,35.891,21.973,46.387l8.533,4.011l7.262-15.462    l-8.124-3.797c-7.441-4.002-11.153-10.615-12.228-22.605h16.23c7.646-0.435,14.694,3.089,19.652,8.764l12.86-11.213    C57.899,78.198,45.628,72.805,33.536,73.044z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/>
                                </g>
                            </g><g>
                                <g>
                                    <path d="M236.22,294.91c-12.254-0.094-23.031,8.226-25.626,20.361l-21.333,107.64h-18.594v-121.95    c-0.017-5.871-2.065-11.605-5.751-16.111l-60.322-74.325c-4.881-6.007-12.109-9.464-19.857-9.472H35.524    c-10.146-0.034-18.432-8.311-18.458-18.441c0-3.226,0.828-6.409,2.432-9.25l38.835-70.025    C65.587,92.312,79.121,86.91,91.17,89.675l25.6,8.533c2.748,0.905,5.769,0.375,8.038-1.442c9.335-7.492,21.99-9.327,33.237-4.753    l14.959,5.76c-7.134,14.191-14.583,17.161-19.968,17.937h-16.503v17.067H153.6c0.35,0,0.7-0.017,1.058-0.051    c16.666-2.057,29.005-14.037,37.717-36.625c0.811-2.116,0.751-4.463-0.162-6.537c-0.922-2.065-2.62-3.686-4.736-4.497l-23.134-8.9    c-15.334-6.263-32.657-4.489-46.327,4.48l-22.212-7.373c-19.797-4.591-40.576,3.729-52.062,21.239L4.599,165.042    C1.587,170.392,0,176.476,0,182.646c0.06,19.499,15.974,35.413,35.499,35.465h49.22c2.577,0.009,4.992,1.161,6.613,3.166    l60.348,74.342c1.237,1.51,1.92,3.413,1.92,5.35v130.475c0,4.719,3.823,8.533,8.533,8.533h34.133c4.079,0,7.578-2.876,8.371-6.878    l22.673-114.381c0.853-4.002,4.454-6.929,8.721-6.741h190.635V294.91H236.22z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#3158c9"/>                        <br/>
                                Sapi
                                <br/>
                                    {{ Form::radio('jenis_hewan', '3')}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">

                        <div class="form-group">
                            {{ Form::label('atas_nama', 'Atas Nama') }}
                            {{ Form::text('atas_nama', null,array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('nama_lain', 'Nama Lain') }}
                            {{ Form::textarea('nama_lain', null ,array('class' => 'form-control')) }}
                        </div>
                    
                        <div class="form-group">
                            {{ Form::label('alamat', 'Alamat') }}
                            {{ Form::textarea('alamat', null,array('class' => 'form-control')) }}
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            {{ Form::label('permintaan', 'Permintaan') }}
                            {{ Form::textarea('permintaan', null,array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('nomor_handphone', 'Nomor Handphone') }}
                            {{ Form::number('nomor_handphone',null,array('class' => 'form-control')) }}
                        </div>
                        <br/>Keterangan Disaksikan
                        <div class="outerDivFull" >
                            <div class="switchToggle">
                                <input type="checkbox" id="switch" value="1" name="disaksikan">
                                <label for="switch">Keterangan Disaksikan</label>
                             </div>
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