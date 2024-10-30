<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Prediksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2,
        h3,
        h4 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }

        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature div {
            width: 45%;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>PT. INDO MARCO PRIMA</h2>
    <h3>Bukti Pengeluaran Barang</h3>
    <p>Tanggal: {{ date('d-m-Y') }}</p>

    @php
        $no1 = 1;
    @endphp
    <h4>Data Hasil Prediksi</h4>
    <table>
        <tr>
            <th>ID User</th>
            <th>Total Final B</th>
            <th>Total Final TB</th>
        </tr>
        <tr>
            <td>{{ $no1++ }}</td>
            <td>{{ $totalFinalB }}</td>
            <td>{{ $totalFinalTB }}</td>
        </tr>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Berpengaruh</th>
                <th>Tidak Berpengaruh</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data2 as $use)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $use->nama }}</td>
                    <td style="color: green;">{{ $use->b }}</td>
                    <td style="color: green;">{{ $use->tb }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <div>Yang Mengeluarkan,</div>
        <div>Mengetahui,</div>
        <br><br><br>
        <div>__________________</div>
        <div>Anton</div>
    </div>
</body>

</html>
