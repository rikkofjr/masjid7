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

<table class="table" width="100%">
    <tr>
        <td colspan="3">Atas Nama : {{$zis->atas_nama}}</td>
    </tr>
    <tr>
        <td colspan="3">Jenis Zakat : {{$zis->jenis_zakat->zis_name}}</td>
    </tr>
    <tr>
        <td>Uang</td>
        <td colspan="1">Beras</td>
    </tr>
    <tr width="50%">
        <td>Zakat : {{number_format($zis->uang)}}</td>
        <td colspan="1">Zakat : {{$zis->beras}}</td>
    </tr>
    <tr width="50%">
        <td>Infaq : {{number_format($zis->uang_infaq)}}</td>
        <td colspan="1">Infaq : {{$zis->beras_infaq}}</td>
    </tr>
    <tr>
        <td colspan="3">
            Penerima : {{$zis->data_amil->name}}
        </td>
        <tr>
        <td colspan="3">
            Kode : <br/>
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('pringZakatJamaah', $zis->uuidq), 'QRCODE')}}" alt="barcode" />
        </td>
        </tr>
    </tr>
</table>