@extends('layouts.startbootstrap')

@section('TitleBar')
    Rumah Jamaah - {{$alamatjamaah->nama_pemilik}} 
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
<!--Row1-->
<style type="text/css">
#radios label {
	cursor: pointer;
	position: relative;
}

#radios label + label {
	margin-left: 15px;
}

input[type="radio"] {
	opacity: 0; /* hidden but still tabable */
	position: absolute;
}

input[type="radio"] + span {
	font-family: 'Material Icons';
	color: #B3CEFB;
	border-radius: 0%;
	padding: 10px;
	padding-top: 20px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
}

input[type="radio"]:checked + span {
	color: #D9E7FD;
  background-color: #4285F4;
}

input[type="radio"]:focus + span {
	color: #fff;
}
#radios label:hover::before {
	content: attr(for);
	font-family: Roboto, -apple-system, sans-serif;
	text-transform: capitalize;
	font-size: 11px;
	position: absolute;
	top: 100%;
	left: 0;
	right: 0;
	opacity: 0.75;
	background-color: #323232;
	color: #fff;	
	padding: 4px;
	border-radius: 3px;
  display: block;
  width:90px;
  text-align:center;
}
.font-size{
    font-size:20px;
}
</style>
<!--Row2-->
@if (Session::has('hapus'))
   <div class="alert alert-info">Data Berhasil Dihapus</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
                <div class="row">
                    <div class="col"><h6 class="m-0 font-weight-bold text-primary">Rumah Jamaah - {{$alamatjamaah->nama_pemilik}} </h6></div>
                    <div class="col-auto"> <a href="{{route('alamat-jamaah.index')}}"> <i class="fas fa-arrow-left font-weight-bold text-primary"></i></a></div>
                </div>
            </div>
			<div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-2">Nama</div>
                            <div class="col-md-10">{{$alamatjamaah->nama_pemilik}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">Alamat</div>
                            <div class="col-md-10">
                                {{$alamatjamaah->alamat}}<br/>
                            RT {{$alamatjamaah->rt}} / RW {{$alamatjamaah->rw}}    
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-2">Nama</div>
                            <div class="col-md-10">{{$alamatjamaah->uuid}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">Nama</div>
                            <div class="col-md-10">{{$alamatjamaah->nama_pemilik}}</div>
                        </div>
                    </div>
                </div>
                <div class="row table-responsive">
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Umur</td>
                            <td>Delete</td>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach($datajamaah as $dj)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dj->nama}} / {{$dj->uuid}} </td>
                            <td>{{date("Y") - date("Y" ,strtotime($dj->tanggal_lahir))}}</td>
                            <td>
                                <a href="{{route('softDeleteJamaah', $dj->id)}}" class="btn btn-primary">
                                    Delete <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data <i class="fas fa-plus"></i>
                </button>
                <a target="_blank"href="{{route('printKeluarga', $alamatjamaah->id)}}" class="btn btn-primary">
                    Print <i class="fas fa-print"></i>
                </a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteData">
                    Delete <i class="fas fa-eraser"></i>
                </button>
			</div>
		</div>
	</div>
</div>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jamaah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('route' => 'data-jamaah.store'))}}
                <div class="form-group">
                    {{ Form::label('nama', 'Nama Jamaah') }}
                    {{ Form::text('nama', '', array('class' => 'form-control')) }}
                    {{ Form::hidden('id_alamat_jamaah', $alamatjamaah->id) }}
                </div>
                {{ Form::label('jenis_kelamin', 'Jenis Kelamin') }}
                    <div id="radios">
                            <label for="Laki-Laki" class="material-icons">
                                <input type="radio" name="jenis_kelamin" id="Laki-Laki" value="1" checked/>
                                <span>
                                    <i class="fas fa-male fa-2x"></i>
                                </span>
                                <br/>
                            </label>								
                            <label for="Perempuan" class="material-icons">
                                <input type="radio" name="jenis_kelamin" id="Perempuan" value="2" />
                                <span>
                                    <i class="fas fa-female fa-2x"></i>
                                </span>
                                <br/>
                            </label>
                        </div>


                <div class="form-group">
                    {{ Form::label('tanggal_lahir', 'Tanggal Lahir') }}
                    {{ Form::date('tanggal_lahir', '', array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit('Tambah', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDataLabel">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h5>Anda Yakin akan menghapus data ini ? </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{route('softDeleteKeluarga', $alamatjamaah->id)}}" class="btn btn-danger">
                    Delete <i class="fas fa-eraser"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('DynamicScript')
		<!-- Specific Page Vendor -->
		<script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        
@endsection

