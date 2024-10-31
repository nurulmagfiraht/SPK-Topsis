<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <!-- Favicons -->
  <link href="/img/icon-sc.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-template/dist/css/adminlte.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin-navbar')

  @include('admin-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Absensi Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <form action="{{ route('admin.absensi.index') }}" method="GET">
                  <div class="row">
                    <div class="col-md-4">
                      <select name="divisi" class="form-control">
                        <option value="">-- Pilih Divisi --</option>
                        @foreach($divisiList as $divisi)
                          <option value="{{ $divisi->divisi }}" {{ request('divisi') == $divisi->divisi ? 'selected' : '' }}>
                            {{ $divisi->divisi }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID Karyawan</th>
                      <th>Nama Karyawan</th>
                      <th>Divisi</th>
                      <th>Jumlah Hadir</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataKaryawan as $key => $Karyawan) 
                    <tr>
                      <td>{{ $Karyawan->id }}</td>
                      <td>{{ $Karyawan->nama }}</td>
                      <td>{{ $Karyawan->divisi }}</td>
                      <td>{{ $Karyawan->jumlah_hadir }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        @if ($dataKaryawan->onFirstPage())
                            <span class="btn btn-sm btn-secondary ml-2 disabled">Previous</span>
                        @else
                            <a href="{{ $dataKaryawan->previousPageUrl() }}" class="btn btn-sm btn-primary ml-2">Previous</a>
                        @endif
                        @if ($dataKaryawan->hasMorePages())
                            <a href="{{ $dataKaryawan->nextPageUrl() }}" class="btn btn-sm btn-primary ml-2">Next</a>
                        @endif
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
@include('footer-admin')
</body>
</html>
