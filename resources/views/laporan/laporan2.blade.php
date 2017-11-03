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
  <body class="A4 landscape style2">
  <section class="sheet padding-25mm">
    <div class="kepala1">
      Data Perusahaan yang terdaftar <br>di Dinas Lingkungan Hidup Pemerintah Kab. Kutai Barat
    </div>
    <table width="100%" border="1" clas s="table2">
        <col style="width:3%">
        <col style="width:25%">
        <col style="width:8%">
        <col style="width:12%">
        <col style="width:12%">
        <col style="width:13%">
        <thead>
          <th style="text-align: center" width="5%">No.</th>
          <th style="text-align: center" width="20%">Nama Perusahaan</th>
          <th style="text-align: center" width="20%">Alamat Perusahaan</th>
          <th style="text-align: center" width="5%">No. TLP</th>
          <th style="text-align: center" width="20%">Email Perusahaan</th>
          <th style="text-align: center" width="30%">Tanggal Registrasi</th>
        </thead>
        <tbody>
          <tr>
            <td style="font-size: 8pt; text-align: center">1</td>
            <td style="font-size: 8pt; text-align: center">2</td>
            <td style="font-size: 8pt; text-align: center">3</td>
            <td style="font-size: 8pt; text-align: center">4</td>
            <td style="font-size: 8pt; text-align: center">5</td>
            <td style="font-size: 8pt; text-align: center">6</td>
          </tr>
          <?php $i = 1; ?>
          @foreach ($perusahaan as $la)
          <tr>
            <td style="text-align: center">{{ $i++ }}</td>
            <td>&ensp;{{ $la->nama_perusahaan }}</td>
            <td>&ensp;{{ $la->alamat_perusahaan }}</td>
            <td style="text-align: center">{{ $la->no_tlp }}</td>
            <td style="text-align: center">{{ $la->email }}</td>
            <td style="text-align: center">{{ date('d M Y',strtotime($la->created_at)) }}</td>
          </tr>
          @endforeach
        </tbody>
      <table>
    </div>
    </section>
  </body>
</html>