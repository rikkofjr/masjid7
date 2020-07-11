@extends('layouts.startbootstrap')
@section('TitleBar')
    Qurban Atas Nama {{$qurban->atas_nama}}
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
                <h4>Qurban Atas Nama : {{$qurban->atas_nama}}</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td colspan="3">Atas Nama : {{$qurban->atas_nama}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Hewan : 
                            @if($qurban->jenis_hewan == 1)
                                Kambing
                                @elseif($qurban->jenis_hewan == 2)
                                    Domba
                                @else
                                    Sapi
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lain : {{$qurban->nama_lain}}</td>
                    </tr>
                    <tr>
                        <td>Permintaan : {{$qurban->permintaan}}</td>
                    </tr>
                    <tr>
                        <td>Keterangan : {{$qurban->keterangan}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Penerima : {{$qurban->data_amil->name}}
                        </td>
                        <tr>
                        <td colspan="3">
                            Kode : 
                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($qurban->id, 'QRCODE')}}" alt="barcode" />
                        </td>
                        </tr>
                    </tr>
                </table>
                <br>
                 
                </a>
                <a href="{{route('qurban.edit', $qurban->id)}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-pen"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>
                @can('Soft Delete Masjid Report')

                <a href="#" data-toggle="modal" data-target="#softDeleteModal" class="btn btn-light btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-eraser"></i>
                    </span>
                    <span class="text">Delete</span>
                </a>
                @endcan
                
            </div>
        </div>
	</div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda yakin untuk menghapus data</div>
        <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <a href="{{route('softDeleteQurban', $qurban->id)}}" class="btn btn-light btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-eraser"></i>
                  </span>
                <span class="text">Delete</span>
            </a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('DynamicScript')
    
    
@endsection
