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

    .filter-section {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }

    .btn-group-custom {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
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

        .btn-group-custom {
            flex-direction: column;
        }

        .btn-group-custom .btn {
            margin-bottom: 10px;
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
                        <!-- Filter Section -->
                        <div class="filter-section">
                            <h5><i class="fas fa-filter"></i> Filter Data</h5>
                            <form method="GET" action="{{ route('admin-hasilspk.index') }}" id="filterForm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="bulan">Bulan:</label>
                                        <select name="bulan" id="bulan" class="form-control">
                                            <option value="">-- Semua Bulan --</option>
                                            <option value="1" {{ $selectedBulan == '1' ? 'selected' : '' }}>Januari</option>
                                            <option value="2" {{ $selectedBulan == '2' ? 'selected' : '' }}>Februari</option>
                                            <option value="3" {{ $selectedBulan == '3' ? 'selected' : '' }}>Maret</option>
                                            <option value="4" {{ $selectedBulan == '4' ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ $selectedBulan == '5' ? 'selected' : '' }}>Mei</option>
                                            <option value="6" {{ $selectedBulan == '6' ? 'selected' : '' }}>Juni</option>
                                            <option value="7" {{ $selectedBulan == '7' ? 'selected' : '' }}>Juli</option>
                                            <option value="8" {{ $selectedBulan == '8' ? 'selected' : '' }}>Agustus</option>
                                            <option value="9" {{ $selectedBulan == '9' ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ $selectedBulan == '10' ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ $selectedBulan == '11' ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ $selectedBulan == '12' ? 'selected' : '' }}>Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tahun">Tahun:</label>
                                        <select name="tahun" id="tahun" class="form-control">
                                            <option value="">-- Semua Tahun --</option>
                                            @for($year = date('Y'); $year >= 2020; $year--)
                                                <option value="{{ $year }}" {{ $selectedTahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>&nbsp;</label><br>
                                        <div class="btn-group-custom">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i> Filter Data
                                            </button>
                                            <a href="{{ route('admin-hasilspk.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-refresh"></i> Reset Filter
                                            </a>
                                                                                    <!-- Print Data Terfilter -->
                                            <a href="{{ route('admin.hasilspk.pdf', ['bulan' => $selectedBulan, 'tahun' => $selectedTahun]) }}" 
                                            class="btn btn-danger" target="_blank">
                                                <i class="fas fa-file-pdf"></i> 
                                                Print PDF
                                                @if($selectedBulan || $selectedTahun)
                                                    (Terfilter)
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Peringkat Karyawan Berdasarkan Penilaian TOPSIS
                                    @if($selectedBulan || $selectedTahun)
                                        <small class="text-muted">
                                            (
                                            @if($selectedBulan && $selectedTahun)
                                                {{ date('F Y', mktime(0, 0, 0, $selectedBulan, 1, $selectedTahun)) }}
                                            @elseif($selectedTahun)
                                                Tahun {{ $selectedTahun }}
                                            @endif
                                            )
                                        </small>
                                    @endif
                                </h3>
                            </div>
                            <div class="card-body">
                                <!-- Tombol Print/Export -->
                                <div class="mb-3">
                                    <div class="btn-group-custom">
                                        
                                        <!-- Print Semua Data -->
                                        <a href="{{ route('admin.hasilspk.pdf', ['print_all' => 1]) }}" 
                                           class="btn btn-success" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Print Semua Data
                                        </a>
                                    </div>
                                </div>
                                
                                @if(count($results) > 0)
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
                                                <th>Tgl Penilaian</th>
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
                                                <td class="text-center">
                                                    <small>{{ $result['tanggal_penilaian'] ? $result['tanggal_penilaian']->format('d/m/Y') : 'N/A' }}</small>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="alert alert-info text-center">
                                    <h4><i class="icon fa fa-info"></i> Tidak Ada Data</h4>
                                    Tidak ada data penilaian karyawan yang sesuai dengan filter yang dipilih.
                                </div>
                                @endif
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
            { "orderable": false, "targets": [4, 7] } // Nonaktifkan sorting untuk kolom detail nilai dan progress
        ]
    });

    // Validasi form filter
    $('#filterForm').on('submit', function(e) {
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        
        if ((!bulan && tahun) || (bulan && !tahun)) {
            e.preventDefault();
            alert('Harap pilih bulan dan tahun untuk melakukan filter data.');
            return false;
        }
    });

    // Validasi tombol print terfilter
    $('#printFilteredBtn').on('click', function(e) {
        e.preventDefault();
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        
        if (!bulan || !tahun) {
            alert('Harap pilih bulan dan tahun terlebih dahulu untuk mencetak data terfilter.');
            return false;
        }
        
        // Jika validasi berhasil, buat URL dan buka di tab baru
        var printUrl = "{{ route('admin.hasilspk.pdf') }}?bulan=" + bulan + "&tahun=" + tahun;
        window.open(printUrl, '_blank');
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});
</script>

</body>
</html>