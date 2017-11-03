<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Report | Lapeling</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <style>@page { size: A4 }</style>
  </head>
  <body  class="A4 landscape style2">
  <section class="sheet padding-25mm">
  <div class="kepala1">
  Data Upload Perusahaan
  </div>
  <div>
  Nama Perusahaan&ensp;&ensp;&ensp;:&ensp;{{ $perusahaan->nama_perusahaan }}<br>
  Alamat Perusahaan&ensp;&ensp;:&ensp;{{ $perusahaan->alamat_perusahaan }}, Tlp. {{ $perusahaan->no_tlp }}
  {{--  Nama Perusahaan        :   {{ $perusahaan->nama_perusahaan }}<br>  --}}
  </div> <br>
    <table width="100%" border="1" clas s="table2">
        <col style="width:3%">
        <col style="width:25%">
        <col style="width:8%">
        <thead>
          <th style="text-align: center">No.</th>
          <th style="text-align: center">Tanggal Upload</th>
          <th style="text-align: center" width="35%">Nama File</th>
        </thead>
        <tbody>
          <tr>
            <td style="font-size: 7pt; text-align: center">1</td>
            <td style="font-size: 7pt; text-align: center">2</td>
            <td style="font-size: 7pt; text-align: center">3</td>
          </tr>
          <?php $i = 1; ?>
          @foreach ($laporan as $la)
          <tr>
            @if (isset($la->nama_file))
              <td style="text-align: center">{{ $i++ }}</td>
              <td style="text-align: center">{{ $la->created_at->format('d M Y H:i:s') }}</td>
              <td style="text-align: center">{{ $la->nama_file }}</td>
            @else
              <td colspan="3">Data Kosong</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      <table>
      <div>
      <div>&nbsp;</div>
      <div>Demikian laporan ini dibuat, untuk dapat dipergunakan sebagaimana mestinya.</div>
    </div>
    <div>
      <div>&nbsp;</div>
      <div>&nbsp;</div>
    </div>
    <div>
      <table width="100%">
        <col style="width:53%">
        <col style="width:47%">
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td class="sign"><span id="spt-tanggal">......................,......................................</span></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="sign">................................................</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign" style="text-decoration: underline;"><strong>.........................</strong></td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign">.....................................</td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign">NIP. .................................................</td>
        </tr>
        </tbody>
      </table>
    </div>
    </section>
  </body>
</html>