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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                            <h1>Departemen: {{ $departemen->nama }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Departemen</li>
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
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Simbol</th>
                                                <th>Kriteria</th>
                                                <th>Bobot (%)</th>
                                                <th>Atribut</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kpiList as $kpi)
                                                <tr>
                                                    <td>{{ $kpi->id }}</td>
                                                    <td>{{ $kpi->simbol }}</td>
                                                    <td>{{ $kpi->kriteria }}</td>
                                                    <td>{{ $kpi->bobot }}%</td>
                                                    <td>{{ $kpi->atribut }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKpiModal-{{ $kpi->id }}">Edit</a>
                                                        
                                                        <form action="{{ route('kpi.destroy', $kpi->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus KPI ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                {{-- create --}}
                                                @include('kpi.create')
                                                @include('kpi.edit', ['item' => $kpi])
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        @include('admin.footer-admin')
    </div>
</body>

</html>
