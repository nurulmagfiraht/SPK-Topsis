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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<style>
    .detail-nilai {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .badge-detail {
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
        margin: 0 5px;
    }

    .ranking-badge {
        font-size: 16px;
        font-weight: bold;
        padding: 8px 12px;
        border-radius: 50%;
        color: white;
        text-align: center;
        min-width: 40px;
    }

    .ranking-1 { background-color: #FFD700; color: #000; } /* Gold */
    .ranking-2 { background-color: #C0C0C0; color: #000; } /* Silver */
    .ranking-3 { background-color: #CD7F32; } /* Bronze */
    .ranking-other { background-color: #6c757d; } /* Gray */

    .preferensi-score {
        font-family: 'Courier New', monospace;
        font-weight: bold;
        color: #007bff;
    }

    @media (max-width: 768px) {
        .detail-nilai {
            display: block;
        }
        
        .badge-detail {
            margin: 5px 0;
        }
        
        .table-responsive {
            font-size: 12px;
        }
    }
</style>
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
                                <h3 class="card-title">Peringkat Karyawan Berdasarkan Penilaian TOPSIS</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.hasilspk.pdf') }}" class="btn btn-primary mb-3" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Print PDF
                                </a>
                                
                                <div class="table-responsive">
                                    <table id="results-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ranking</th>
                                                <th>Nama Karyawan</th>
                                                <th>Divisi</th>
                                                <th>Outlet</th>
                                                <th>Detail Nilai</th>
                                                <th>Skor Preferensi</th>
                                                <th>Status Bonus</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($results as $index => $result)
                                            <tr>
                                                <td class="text-center">
                                                    <span class="ranking-badge 
                                                        @if($result['ranking'] == 1) ranking-1
                                                        @elseif($result['ranking'] == 2) ranking-2
                                                        @elseif($result['ranking'] == 3) ranking-3
                                                        @else ranking-other
                                                        @endif">
                                                        {{ $result['ranking'] }}
                                                    </span>
                                                </td>
                                                <td><strong>{{ $result['nama'] }}</strong></td>
                                                <td>{{ $result['divisi'] }}</td>
                                                <td>{{ $result['outlet'] }}</td>
                                                <td>
                                                    <div class="detail-nilai">
                                                        <span style="background-color: red; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C1</span>: {{ $result['nilai']['c1'] }}%, 
                                                        <span style="background-color: blue; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C2</span>: {{ $result['nilai']['c2'] }}%, 
                                                        <span style="background-color: green; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C3</span>: {{ $result['nilai']['c3'] }}%, 
                                                        <span style="background-color: orange; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C4</span>: {{ $result['nilai']['c4'] }}%, 
                                                        <span style="background-color: purple; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C5</span>: {{ $result['nilai']['c5'] }}%, 
                                                        <span style="background-color: pink; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C6</span>: {{ $result['nilai']['c6'] }}%, 
                                                        <span style="background-color: brown; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C7</span>: {{ $result['nilai']['c7'] }}%, 
                                                        <span style="background-color: teal; color: white; padding: 3px 8px; border-radius: 3px; font-size: 11px;">C8</span>: {{ $result['nilai']['c8'] }}%
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="preferensi-score">{{ $result['preferensi_score'] }}</span>
                                                    <br>
                                                    <small class="text-muted">Vector Score</small>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge {{ $result['mendapat_bonus'] ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $result['total_nilai'] }}% - 
                                                        {{ $result['mendapat_bonus'] ? 'Mendapat Bonus' : 'Belum Mendapat Bonus' }}
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
                                                    <small class="text-muted">{{ $result['total_nilai'] }}%</small>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Info Metode TOPSIS -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Metode TOPSIS</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Bobot Kriteria:</h5>
                                        <ul class="list-unstyled">
                                            <li><span class="badge bg-danger">C1</span> Kualitas Kerja: 30%</li>
                                            <li><span class="badge bg-primary">C2</span> Kuantitas Kerja: 13%</li>
                                            <li><span class="badge bg-success">C3</span> Pengetahuan Kerja: 12%</li>
                                            <li><span class="badge bg-warning">C4</span> Kerjasama: 10%</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Kriteria Lanjutan:</h5>
                                        <ul class="list-unstyled">
                                            <li><span class="badge bg-secondary">C5</span> Inisiatif: 10%</li>
                                            <li><span class="badge bg-info">C6</span> Komunikasi: 10%</li>
                                            <li><span class="badge bg-dark">C7</span> Kehadiran: 5%</li>
                                            <li><span class="badge bg-primary">C8</span> Integritas: 10%</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-muted">
                                    <strong>Keterangan:</strong><br>
                                    - <strong>Skor Preferensi:</strong> Nilai mentah TOPSIS (0-1), semakin tinggi semakin baik<br>
                                    - <strong>Skor TOPSIS (%):</strong> Nilai preferensi dalam bentuk persentase<br>
                                    - <strong>Ranking:</strong> Urutan berdasarkan skor TOPSIS tertinggi<br>
                                    - <strong>Status Bonus:</strong> Berdasarkan total nilai ≥ 60%
                                </p>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
        "pageLength": 25,
        "order": [[ 0, "asc" ]], // Urutkan berdasarkan ranking
        "columnDefs": [
            { 
                "targets": [0], // Kolom ranking
                "type": "num",
                "orderable": true
            },
            { 
                "targets": [5], // Kolom skor preferensi
                "type": "num",
                "orderable": true
            },
            { "orderable": false, "targets": [4, 8] } // Nonaktifkan sorting untuk kolom detail nilai dan progress
        ]
    });
});
</script>

</body>
</html>