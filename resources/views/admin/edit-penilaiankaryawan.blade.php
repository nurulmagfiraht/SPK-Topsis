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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f6f9;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.admin-navbar')

        @include('admin.admin-sidebar')

        <div class="content-wrapper">
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
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Penilaian Karyawan</h3>
                                </div>
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

                                    <form action="{{ route('edit-penilaiankaryawan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">

                                        <table>
                                            <tr>
                                                <th>Field</th>
                                                <th>Input</th>
                                            </tr>
                                            <tr>
                                                <td>Nama Karyawan</td>
                                                <td><input type="text" class="form-control" value="{{ $karyawan->nama }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>Divisi</td>
                                                <td><input type="text" class="form-control" value="{{ $divisi->nama }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>Kehadiran</td>
                                                <td><input type="number" class="form-control" value="{{ $absensi ? $absensi->jumlah_hadir : 0 }}" readonly></td>
                                            </tr>
                                            @foreach ($kpiList as $index => $kpi)
                                                <tr>
                                                    <td>C{{ $index + 1 }}: {{ $kpi->kriteria }}</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" 
                                                                   name="c{{ $index + 1 }}" 
                                                                   value="{{ old('c'.($index + 1)) }}" 
                                                                   placeholder="{{ $kpi->kriteria }}" 
                                                                   max="{{ $kpi->bobot }}" 
                                                                   min="0" 
                                                                   required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                        @error('c'.($index + 1))
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('admin.footer-admin')
        </div>
    </div>

    <script src="/admin-template/plugins/jquery/jquery.min.js"></script>
    <script src="/admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-template/dist/js/adminlte.min.js"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ $errors->first() }}",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>