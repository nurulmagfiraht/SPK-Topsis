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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/admin-template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
            <h1>Daftar KPI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar KPI</li>
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
                <h3 class="card-title">Daftar KPI</h3>
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#createKpiModal">
                  Tambah KPI
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Simbol</th>
                      <th>Kriteria</th>
                      <th>Bobot</th>
                      {{-- <th>Atribut</th> --}}
                      <th>Divisi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kpi as $key => $item)
                    <tr>
                      <td>{{ $item->simbol }}</td>
                      <td>{{ $item->kriteria }}</td>
                      <td>{{ $item->bobot }}%</td>
                      {{-- <td>{{ $item->atribut }}</td> --}}
                      <td>{{ $item->divisi->nama ?? 'Tidak ada divisi' }}</td>
                      <td>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKpiModal-{{ $item->id }}">Edit</a>
                        <form action="{{ route('kpi.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus KPI ini?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @include('kpi.create')
                    @include('kpi.edit', ['item' => $item])
                    @endforeach
                  </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <div>
                    @if($kpi->lastPage() <= 5)
                      @for ($i = 1; $i <= $kpi->lastPage(); $i++)
                        <a href="{{ $kpi->url($i) }}" class="{{ $kpi->currentPage() == $i ? 'btn btn-sm btn-primary ml-2 active' : 'btn btn-sm btn-primary ml-2' }}">{{ $i }}</a>
                      @endfor
                    @else
                      @for ($i = 1; $i <= 2; $i++)
                        <a href="{{ $kpi->url($i) }}" class="{{ $kpi->currentPage() == $i ? 'btn btn-sm btn-primary ml-2 active' : 'btn btn-sm btn-primary ml-2' }}">{{ $i }}</a>
                      @endfor
                      <span class="btn btn-sm btn-primary ml-2">...</span>
                      @for ($i = $kpi->lastPage() - 2; $i <= $kpi->lastPage(); $i++)
                        <a href="{{ $kpi->url($i) }}" class="{{ $kpi->currentPage() == $i ? 'btn btn-sm btn-primary ml-2 active' : 'btn btn-sm btn-primary ml-2' }}">{{ $i }}</a>
                      @endfor
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin.footer-admin')
</div>
<!-- ./wrapper -->
</body>
</html>
