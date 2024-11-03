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
    <h3>Prediksi Pendapatan Bulan Depan</h3>
    <p>Tanggal: {{ date('d-m-Y') }}</p>

    <h4>Data Hasil Prediksi</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
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

    @php
        $no1 = 1;
    @endphp
    <h4>Data Kelas</h4>
    <table>
        <tr>
            <th>No</th>
            <th>Berpengaruh</th>
            <th>Tidak Berpengaruh</th>
        </tr>
        <tr>
            <td>{{ $no1++ }}</td>
            <td>{{ $totalFinalB }}</td>
            <td>{{ $totalFinalTB }}</td>
        </tr>
    </table>

    @if ($totalFinalB > $totalFinalTB)
        <div class="mt-5 p-3" style="background-color: #28a745; color: white;">
            <p>{{ $totalFinalB }}</p>
            <p>Berdasarkan parameter yang anda inputkan, maka hasil menunjukkan
                bahwa keuntungan affiliator “berpengaruh” terhadap adanya penutupan
                toko luar negeri oleh pihak Shopee Indonesia. Dengan adanya sistem
                ini, diharapkan para affiliator dapat menentukan strategi pemasaran
                yang tepat sehingga keuntungan kembali stabil dan promosi produk
                Shopee akan lebih fokus hanya pada UMKM
            </p>
        </div>
    @elseif($totalFinalB < $totalFinalTB)
        <div class="mt-5 p-3" style="background-color: #28a745; color: white;">
            <p>{{ $totalFinalTB }}</p>
            <p>Berdasarkan parameter yang anda inputkan, maka hasil menunjukkan
                bahwa keuntungan affiliator “tidak berpengaruh” terhadap adanya
                penutupan toko luar negeri oleh pihak Shopee Indonesia. Sehingga
                tidak terdapat perbedaan keuntungan, hanya saja promosi produk
                Shopee akan lebih fokus hanya pada UMKM
            </p>
        </div>
    @else
        <div class="mt-5 p-3" style="background-color: #28a745; color: white;">
            <p>Kedua nilai sama besar: {{ $totalFinalB }}</p>
        </div>
    @endif

    <div class="signature">
        <div>Yang Mengeluarkan,</div>
        <div>Mengetahui,</div>
        <br><br><br>
        <div>__________________</div>
        <div>{{ Auth::user()->name }}</div>
    </div>
</body>

</html>
