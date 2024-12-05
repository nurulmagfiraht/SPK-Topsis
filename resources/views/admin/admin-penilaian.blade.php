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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin.admin-navbar')

  @include('admin.admin-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penilaian Kinerja Karyawan</h1>
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
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID Karyawan</th>
                      <th>Nama Karyawan</th>
                      <th>Divisi</th>
                      <th>Outlet</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataKaryawan as $key => $Karyawan) 
                    <tr>
                      <td>{{ $Karyawan->dataKaryawan->id ?? 'ID tidak ditemukan' }}</td>
                      <td>{{ $Karyawan->dataKaryawan->nama ?? 'Nama tidak ditemukan' }}</td>  
                      <td>{{ $Karyawan->dataKaryawan->divisi->nama ?? 'Divisi tidak ditemukan' }}</td>
                      <td>{{ $Karyawan->dataKaryawan->outlet->nama ?? 'Outlet tidak ditemukan' }}</td>
                      <td>
                        @if($Karyawan->dataKaryawan->penilaian)
                          <span class="badge badge-success">Selesai</span>  
                        @else
                          <span class="badge badge-warning">Belum</span>
                        @endif
                      </td>
                      <td><a href="{{ route('edit-penilaiankaryawan.index', $Karyawan->dataKaryawan->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        @if ($dataKaryawan->onFirstPage())
                            <span class="btn btn-sm btn-secondary ml-2 disabled">Sebelumnya</span>
                        @else
                            <a href="{{ $dataKaryawan->previousPageUrl() }}" class="btn btn-sm btn-primary ml-2">Sebelumnya</a>
                        @endif
                        @if ($dataKaryawan->hasMorePages())
                            <a href="{{ $dataKaryawan->nextPageUrl() }}" class="btn btn-sm btn-primary ml-2">Berikutnya</a>
                        @endif
                    </div>
                    <div>
                        <ul class="pagination pagination-sm m-0 float-right">
                            @foreach ($dataKaryawan->getUrlRange(1, $dataKaryawan->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $dataKaryawan->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
              </div>
              
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
@include('admin.footer-admin')
</body>
</html>
