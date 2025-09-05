<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil SPK Bonus Karyawan - PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 18px;
        }
        
        .filter-info {
            text-align: center;
            background-color: #e9ecef;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 12px;
            color: #495057;
        }
        
        .info-section {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        
        .info-section h3 {
            margin: 0 0 10px 0;
            color: #495057;
            font-size: 14px;
        }
        
        .criteria-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .criteria-group {
            flex: 1;
            min-width: 200px;
        }
        
        .criteria-item {
            margin: 3px 0;
            font-size: 11px;
        }
        
        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            color: white;
            font-size: 10px;
            font-weight: bold;
            margin-right: 5px;
        }
        
        .badge-c1 { background-color: #dc3545; }
        .badge-c2 { background-color: #007bff; }
        .badge-c3 { background-color: #28a745; }
        .badge-c4 { background-color: #ffc107; color: #000; }
        .badge-c5 { background-color: #6f42c1; }
        .badge-c6 { background-color: #e83e8c; }
        .badge-c7 { background-color: #795548; }
        .badge-c8 { background-color: #20c997; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        table, th, td {
            border: 1px solid #333;
        }
        
        th {
            background-color: #f8f9fa;
            padding: 8px 6px;
            text-align: center;
            font-weight: bold;
            font-size: 11px;
        }
        
        td {
            padding: 6px;
            text-align: left;
            font-size: 10px;
            vertical-align: middle;
        }
        
        .text-center {
            text-align: center;
        }
        
        .ranking-badge {
            font-size: 12px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 50%;
            color: white;
            text-align: center;
            min-width: 25px;
            display: inline-block;
        }
        
        .ranking-1 { background-color: #FFD700; color: #000; }
        .ranking-2 { background-color: #C0C0C0; color: #000; }
        .ranking-3 { background-color: #CD7F32; }
        .ranking-other { background-color: #6c757d; }
        
        .detail-nilai {
            font-size: 9px;
            line-height: 1.3;
        }
        
        .preferensi-score {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            color: #007bff;
            font-size: 11px;
        }
        
        .status-bonus {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
        }
        
        .status-dapat { background-color: #28a745; color: white; }
        .status-belum { background-color: #dc3545; color: white; }
        
        .progress-text {
            font-size: 10px;
            color: #666;
        }
        
        .footer-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            font-size: 10px;
            color: #666;
        }
        
        .footer-info strong {
            color: #333;
        }
        
        @media print {
            body { margin: 10px; }
            .info-section { page-break-inside: avoid; }
            table { page-break-inside: auto; }
            tr { page-break-inside: avoid; }
        }
    </style>
</head>
<body>
    <h1>Hasil SPK Bonus Karyawan</h1>
    
    <!-- Informasi Filter -->
    <div class="filter-info">
        @if(isset($filterInfo) && ($filterInfo['bulan'] || $filterInfo['tahun'] || $filterInfo['printAll']))
            @if($filterInfo['printAll'])
                <strong>SEMUA DATA PENILAIAN KARYAWAN</strong>
            @else
                <strong>DATA TERFILTER:</strong>
                @if($filterInfo['bulan'] && $filterInfo['tahun'])
                    {{ date('F Y', mktime(0, 0, 0, $filterInfo['bulan'], 1, $filterInfo['tahun'])) }}
                @elseif($filterInfo['tahun'])
                    Tahun {{ $filterInfo['tahun'] }}
                @endif
            @endif
        @else
            Peringkat Karyawan Berdasarkan Penilaian TOPSIS
        @endif
        <br>
        <small>Total Data: {{ count($results) }} Karyawan</small>
    </div>

    <!-- Tabel Hasil -->
    <table>
        <thead>
            <tr>
                <th style="width: 8%;">Ranking</th>
                <th style="width: 15%;">Nama Karyawan</th>
                <th style="width: 12%;">Divisi</th>
                <th style="width: 12%;">Outlet</th>
                <th style="width: 25%;">Detail Nilai</th>
                <th style="width: 10%;">Skor Preferensi</th>
                <th style="width: 13%;">Status Bonus</th>
                <th style="width: 5%;">Progress</th>
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
                        <span class="badge badge-c1">C1</span>: {{ $result['nilai']['c1'] }}%, 
                        <span class="badge badge-c2">C2</span>: {{ $result['nilai']['c2'] }}%, 
                        <span class="badge badge-c3">C3</span>: {{ $result['nilai']['c3'] }}%, 
                        <span class="badge badge-c4">C4</span>: {{ $result['nilai']['c4'] }}%<br>
                        <span class="badge badge-c5">C5</span>: {{ $result['nilai']['c5'] }}%, 
                        <span class="badge badge-c6">C6</span>: {{ $result['nilai']['c6'] }}%, 
                        <span class="badge badge-c7">C7</span>: {{ $result['nilai']['c7'] }}%, 
                        <span class="badge badge-c8">C8</span>: {{ $result['nilai']['c8'] }}%
                    </div>
                </td>
                <td class="text-center">
                    <span class="preferensi-score">{{ $result['preferensi_score'] }}</span>
                    <br>
                    <small style="font-size: 8px; color: #666;">Vector Score</small>
                </td>
                <td class="text-center">
                    <span class="status-bonus {{ $result['mendapat_bonus'] ? 'status-dapat' : 'status-belum' }}">
                        {{ $result['total_nilai'] }}% - 
                        {{ $result['mendapat_bonus'] ? 'Mendapat Bonus' : 'Belum Mendapat Bonus' }}
                    </span>
                </td>
                <td class="text-center">
                    <div class="progress-text">{{ $result['total_nilai'] }}%</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Informasi Metode TOPSIS -->
    <div class="info-section">
        <h3>Informasi Metode TOPSIS</h3>
        <div class="criteria-info">
            <div class="criteria-group">
                <strong>Bobot Kriteria:</strong>
                <div class="criteria-item"><span class="badge badge-c1">C1</span> Kualitas Kerja: 30%</div>
                <div class="criteria-item"><span class="badge badge-c2">C2</span> Kuantitas Kerja: 13%</div>
                <div class="criteria-item"><span class="badge badge-c3">C3</span> Pengetahuan Kerja: 12%</div>
                <div class="criteria-item"><span class="badge badge-c4">C4</span> Kerjasama: 10%</div>
            </div>
            <div class="criteria-group">
                <strong>Kriteria Lanjutan:</strong>
                <div class="criteria-item"><span class="badge badge-c5">C5</span> Inisiatif: 10%</div>
                <div class="criteria-item"><span class="badge badge-c6">C6</span> Komunikasi: 10%</div>
                <div class="criteria-item"><span class="badge badge-c7">C7</span> Kehadiran: 5%</div>
                <div class="criteria-item"><span class="badge badge-c8">C8</span> Integritas: 10%</div>
            </div>
        </div>
    </div>


</body>
</html>