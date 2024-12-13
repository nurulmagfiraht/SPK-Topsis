<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Hasil SPK</title>
    <!-- Favicons -->
    <link href="/img/icon-sc.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS harus dimuat pertama -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Kemudian CSS lainnya -->
    <link rel="stylesheet" href="/admin-template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin-template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.admin-navbar')
    @include('admin.admin-sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hasil SPK Bonus Karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hasil SPK</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Peringkat Karyawan Berdasarkan Penilaian</h3>
                            </div>
                            <div class="card-body">
                                <table id="results-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Peringkat</th>
                                            <th>Nama Karyawan</th>
                                            <th>Divisi</th>
                                            <th>Outlet</th>
                                            <th>Detail Nilai</th>
                                            <th>Status Bonus</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $index => $result)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $result['nama'] }}</td>
                                            <td>{{ $result['divisi'] }}</td>
                                            <td>{{ $result['outlet'] }}</td>
                                            <td>
    <span style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px;">C1</span>: {{ $result['nilai']['c1'] }}%, 
    <span style="background-color: blue; color: white; padding: 5px 10px; border-radius: 5px;">C2</span>: {{ $result['nilai']['c2'] }}%, 
    <span style="background-color: green; color: white; padding: 5px 10px; border-radius: 5px;">C3</span>: {{ $result['nilai']['c3'] }}%, 
    <span style="background-color: orange; color: white; padding: 5px 10px; border-radius: 5px;">C4</span>: {{ $result['nilai']['c4'] }}%, 
    <span style="background-color: purple; color: white; padding: 5px 10px; border-radius: 5px;">C5</span>: {{ $result['nilai']['c5'] }}%, 
    <span style="background-color: pink; color: white; padding: 5px 10px; border-radius: 5px;">C6</span>: {{ $result['nilai']['c6'] }}%, 
    <span style="background-color: brown; color: white; padding: 5px 10px; border-radius: 5px;">C7</span>: {{ $result['nilai']['c7'] }}%, 
    <span style="background-color: teal; color: white; padding: 5px 10px; border-radius: 5px;">C8</span>: {{ $result['nilai']['c8'] }}%, 
    <span style="background-color: crimson; color: white; padding: 5px 10px; border-radius: 5px;">C9</span>: {{ $result['nilai']['c9'] }}%, 
    <span style="background-color: gold; color: black; padding: 5px 10px; border-radius: 5px;">C10</span>: {{ $result['nilai']['c10'] }}%
</td>


                                            <td>
                                                <span class="badge {{ $result['mendapat_bonus'] ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $result['total_nilai'] }}% - 
                                                    {{ $result['mendapat_bonus'] ? 'Mendapatkan Bonus' : 'Belum Mendapatkan Bonus' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar 
                                                        @if($result['total_nilai'] >= 80)
                                                            bg-success
                                                        @elseif($result['total_nilai'] >= 60)
                                                            bg-primary  
                                                        @elseif($result['total_nilai'] >= 40)
                                                            bg-warning
                                                        @else
                                                            bg-danger
                                                        @endif"
                                                        style="width: {{ $result['total_nilai'] }}%">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.footer-admin')
</div>

<!-- Scripts -->
<!-- <script src="/admin-template/plugins/jquery/jquery.min.js"></script>
<script src="/admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-template/dist/js/adminlte.min.js"></script> -->

<script>
$(document).ready(function() {
    $('#results-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

</body>
</html>