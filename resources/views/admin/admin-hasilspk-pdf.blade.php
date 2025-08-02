<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil SPK Karyawan - PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .badge {
            padding: 3px 6px;
            border-radius: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h1>Hasil SPK Karyawan</h1>

    <table>
        <thead>
            <tr>
                <th>No.</th>
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
                    @foreach($result['nilai'] as $key => $value)
                        <span class="badge" style="background-color: {{ $key == 'c1' ? 'red' : ($key == 'c2' ? 'blue' : ($key == 'c3' ? 'green' : 'orange')) }};">
                            {{ strtoupper($key) }}: {{ $value }}%
                        </span>
                    @endforeach
                </td>
                <td>
                    {{ $result['mendapat_bonus'] ? 'Mendapatkan Bonus' : 'Belum Mendapatkan Bonus' }}
                </td>
                <td>
                    {{ $result['topsis_score'] }}%
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
