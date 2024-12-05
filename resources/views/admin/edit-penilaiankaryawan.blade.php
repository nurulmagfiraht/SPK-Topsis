<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- Favicons -->
    <link href="/img/icon-sc.png" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-template/dist/css/adminlte.min.css">
    <style>
        html, body {
            height: 100%;
        }
        .content-wrapper {
            height: calc(100% - 56px); /* Adjust based on the height of the navbar */
        }
        .card {
            height: 100%;
        }
    </style>
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
                                <li class="breadcrumb-item active">Penilaian Kinerja Karyawan</li>
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
                                    <h3 class="card-title">Penilaian Karyawan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- form start -->
                                    <form action="{{ route('edit-penilaiankaryawan.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
                                        <div class="form-group">
                                            <label for="namaKaryawan">Nama Karyawan</label>
                                            <input type="text" class="form-control" id="namaKaryawan" placeholder="Nama Karyawan" value="{{ $karyawan->nama }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Divisi</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Divisi" value="{{ $divisi->nama }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="kehadiran">Kehadiran</label>
                                            <input type="number" class="form-control" id="kehadiran" placeholder="Kehadiran" value="{{ $karyawan->jumlah_hadir }}" readonly>
                                        </div>
                                        @foreach ($kpiList as $index => $kpi)
                                            <div class="form-group">
                                                <label for="kriteria{{ $kpi->id }}">C{{ $index + 1 }}: {{ $kpi->kriteria }}</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="kriteria{{ $kpi->id }}" name="c{{ $index + 1 }}" placeholder="{{ $kpi->kriteria }}" max="{{ $kpi->bobot }}" min="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            @include('admin.footer-admin')
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="/admin-template/plugins/jquery/jquery.min.js"></script>
    <script src="/admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-template/dist/js/adminlte.min.js"></script>
</body>

</html>
