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
<h1>Keluarga {{$alamatjamaah->nama_pemilik}}</h1>
<table width="100%" align="top">
    <tr class="table-header">
        <td width="40%" class="table-header">Nama Keluarga</td>
        <td width="60%" class="table-header">: {{$alamatjamaah->nama_pemilik}}</td>
    </tr>
    <tr>
        <td width="20%" class="table-header">Nama Keluarga</td>
        <td width="30%" class="table-header">
            : {{$alamatjamaah->alamat}}<br/>
            &nbsp; RT {{$alamatjamaah->rt}}/ RW {{$alamatjamaah->rw}}
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="10%" class="table-header-data" style="text-align:center;">No</td>
        <td width="80%" class="table-header-data">Nama</td>
        <td width="10%" class="table-header-data">Umur</td>
    </tr>
    <?php $no = 1;?>
    @foreach($datajamaah as $dj)
    <tr>
        <td class="table-body" style="text-align:center;">{{$no++}}</td>
        <td class="table-body">{{$dj->nama}}</td>
        <td class="table-body">{{date("Y") - date("Y" ,strtotime($dj->tanggal_lahir))}}</td>
    </tr>
    @endforeach
</table>