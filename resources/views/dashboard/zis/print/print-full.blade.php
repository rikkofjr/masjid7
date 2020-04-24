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

</style>
<h1>Print Zakat {{$ziss[0]->jenis_zakat->zis_name}}{{$todayHijri}} </h1>
<table width="100%">
    <tr>
        <td width="5%" class="table-header-data" style="text-align:center;" rowspan="2">No</td>
        <td width="20%" class="table-header-data" rowspan="2">Tanggal</td>
        <td width="20%" class="table-header-data" rowspan="2">Nama</td>
        <td width="25%" class="table-header-data" style="text-align:center;" colspan="2">Jumlah Uang</td>
        <td width="25%" class="table-header-data" style="text-align:center;" colspan="2">Jumlah Beras</td>
    </tr>
    <tr>
        <td style="text-align:center;">Zakat</td>
        <td style="text-align:center;">Infaq</td>
        <td style="text-align:center;">Zakat</td>
        <td style="text-align:center;">Infaq</td>
    </tr>
    <?php $no = 1;?>
    @foreach($ziss as $zias)
    <tr>
        <td class="table-body" style="text-align:center;">{{$no++}}</td>
        <td class="table-body">{{date_format($zias->created_at, 'd-m-Y')}}</td>
        <td class="table-body">{{$zias->atas_nama}}</td>
        <td class="table-body" style="text-align:right;">{{number_format($zias->uang)}}</td>
        <td class="table-body" style="text-align:right;">{{number_format($zias->uang_infaq)}}</td>
        <td class="table-body" style="text-align:right;">{{$zias->beras}}</td>
        <td class="table-body" style="text-align:right;">{{$zias->beras_infaq}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;">{{number_format($jumlahUangZakatTahunIni)}}</td>
        <td style="text-align:right;">{{number_format($jumlahUangInfaqTahunIni)}}</td>
        <td style="text-align:right;">{{number_format($jumlahBerasZakatTahunIni)}}</td>
        <td style="text-align:right;">{{number_format($jumlahBerasInfaqTahunIni)}}</td>
    </tr>
</table>