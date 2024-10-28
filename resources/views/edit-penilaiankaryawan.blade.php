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
        @include('admin-navbar')

        @include('admin-sidebar')

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
                                    <!-- form start -->
                                    <form>
                                        <div class="form-group">
                                            <label for="namaKaryawan">Nama Karyawan</label>
                                            <input type="text" class="form-control" id="namaKaryawan" placeholder="Nama Karyawan" value="{{ $karyawan->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Divisi</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Divisi" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 1</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 1" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 2</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 2" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 3</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 3" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 4</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 4" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 5</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 5" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 6</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 6" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 7</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 7" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 8</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 8" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 9</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 9" value="    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Kriteria 10</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Kriteria 10" value="   ">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
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
            @include('footer-admin')
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
