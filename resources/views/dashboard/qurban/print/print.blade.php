<style type="text/css">
    h1{
        font-family:sans-serif;
        color:#ff0000;
        font-size:30px;
    }
    .table-header{
        border-bottom:solid 1px #e3e6f0;
        padding: 5px 0px;
        font-family:sans-serif;
    }
    .table-header-data{
        background-color:#e3e6f0;
        font-family:sans-serif;
    }
    .table-body{
        border-bottom:solid 1px #e3e6f0;
        font-family:sans-serif;
    }
    .table td{
        border-bottom:solid 1px #ccc;
        font: 15px Arial, sans-serif;
        padding: 10px;
    }

</style>
<img src="{{ public_path('lawncare/images/logo.png')}}" width="50px">

<table class="table">
                    <tr>
                        <td colspan="3">Atas Nama : {{$qurban->atas_nama}} | {{$qurban->nomor_handphone}}</td>
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
                        <td>Keterangan : @if($qurban->disaksikan == 1) Disaksikan @endif</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Penerima : {{$qurban->data_amil->name}}
                        </td>
                    </tr>
                </table>    
<img src="data:image/png;base64,{{DNS2D::getBarcodePNG($qurban->id, 'QRCODE')}}" alt="barcode" />
