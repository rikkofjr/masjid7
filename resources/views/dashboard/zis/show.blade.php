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
                <h4>Zakat Atas Nama : {{$zis->atas_nama}}</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td colspan="3">Atas Nama : {{$zis->atas_nama}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Zakat : {{$zis->jenis_zakat->zis_name}}</td>
                    </tr>
                    <tr>
                        <td>Uang</td>
                        <td>Beras</td>
                    </tr>
                    <tr width="50%">
                        <td>Zakat : {{number_format($zis->uang)}}</td>
                        <td>Zakat : {{$zis->beras}}</td>
                    </tr>
                    <tr width="50%">
                        <td>Infaq : {{number_format($zis->uang_infaq)}}</td>
                        <td>Infaq : {{$zis->beras_infaq}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Penerima : {{$zis->data_amil->name}}
                        </td>
                        <tr>
                        <td colspan="3">
                            Kode : {{$zis->uuidq}}
                        </td>
                        </tr>
                    </tr>
                </table>
                <br>
                <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
                <a href="{{route('zis.edit', $zis->id)}}" class="btn btn-primary btn-icon-split">
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
            <a href="{{route('softDeleteZis', $zis->uuidq)}}" class="btn btn-light btn-icon-split">
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
    <script src="{{asset ('js/calculate.js')}}"></script>
    
    
@endsection
