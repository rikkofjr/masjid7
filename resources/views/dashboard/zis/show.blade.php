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
                <a href="{{route('zis.index')}}" class="btn btn-light btn-icon-split">
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
