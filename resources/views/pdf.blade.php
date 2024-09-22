<!DOCTYPE html>
<html>
<head>
    <title>Hasil Prediksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Prediksi</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Berpengaruh</th>
                <th>Tidak Berpengaruh</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $use)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $use->nama }}</td>
                    <td>{{ $use->b }}</td>
                    <td>{{ $use->tb }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Kelas</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($dataKelas as $use)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $use->nama }}</td>
                    <td>{{ $use->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Final B: {{ $totalFinalB }}</p>
    <p>Total Final TB: {{ $totalFinalTB }}</p>
</body>
</html>
