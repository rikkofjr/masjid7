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
        @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                <h4>Invoice Zakat Atas Nama : {{$zis->atas_nama}}</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td colspan="3">Atas Nama : {{$zis->atas_nama}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Zakat : {{$zis->jenis_zakatt->zis_name}}, Untuk {{$zis->jumlah_jiwa}} Jiwa</td> 
                    </tr>
                    <tr>
                        <td>Berupa Uang</td>
                    </tr>
                    <tr width="50%">
                        <td>Zakat : {{number_format($zis->uang_zakat * $zis->jumlah_jiwa)}}</td>  
                    </tr>
                    <tr width="50%">
                        <td>Infaq : {{number_format($zis->uang_infaq)}}</td>
                    </tr>
                    <tr width="50%">
                        <td><b>Total yang harus dibayar : {{number_format(($zis->uang_zakat * $zis->jumlah_jiwa) + $zis->uang_infaq)}}</b></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Perubah Data : {{$zis->perubah_data->name}}
                        </td>
                        <tr>
                            <td colspan="3">
                                <a href="{{asset('transfer/'.$zis->gambar)}}">
                                    <img src="{{asset('transfer/'.$zis->gambar)}}" width="100px"><br/>
                                </a>
                                @if($zis->status == 0)
                                    <div class="btn btn-danger btn-icon-split">Belum Dibayar</div>
                                @endif
                                @if($zis->status == 1)
                                    <div class="btn btn-warning btn-icon-split">Menunggu Diproses</div>
                                @endif
                                @if($zis->status == 2)
                                    
                                    <div class="btn btn-warning btn-icon-split">Menunggu Diproses</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Transfer dilakukan pada bank BXX , dengan nomor rekening x09090909 A.n Sxmk
                            </td>
                        </tr>
                    </tr>
                </table>
                <br>
                
                @if($zis->status == 0)
                <a href="#" data-toggle="modal" data-target="#konfirmasiPembayaran" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-eraser"></i>
                    </span>
                    <span class="text">Konfirmasi Pembayaran</span>
                </a>
                @endif
                @can('Create Masjid Report')
                    @if($zis->status == 1)
                    {{ Form::model($zis, array('route' => array('invZisUpTo2', $zis->uuid), 'method' => 'PUT')) }}

                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Setujui Pembayaran</span>
                    </button>
                    
                    {{ Form::close() }}
                    @endif
                @endcan
                @if($zis->status == 3)
                Terimakasih... <br/>
                Pembayaran kamu telah kami terima yaa..<br/> 
                Semoga pahala kamu dilipat gandakan :)<br/>
                <!--<a href="{{route('pringZakatJamaah', $zis->uuid)}}" data-toggle="modal" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-eraser"></i>
                    </span>
                    <span class="text">Print Bukti</span>
                </a>-->

                @endif
                @can('Soft Delete Masjid Report')

                
                @endcan
                
            </div>
        </div>
	</div>
</div>
@can('Create Masjid Report')
    @if($zis->status == 2)
        <x-createFaktur :zis="$zis"/>
    @endif
@endcan
<!-- Delete Modal-->
<div class="modal fade" id="konfirmasiPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            Upload screenshot atau foto Bukti transfer anda pada form berikut<br/>
            {{ Form::model($zis, array('route' => array('invoice-zis.update', $zis->uuid), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
                
                <div class="form-group">
                    {{ Form::label('gambar', 'Bukti transfer') }}
                    <input type="file" name="gambar" value="{{$zis->gambar}}" id="gambar" class="form-control">
                </div>
                


                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@section('DynamicScript')
    <script src="{{asset ('js/calculate.js')}}"></script>
    
    
@endsection
