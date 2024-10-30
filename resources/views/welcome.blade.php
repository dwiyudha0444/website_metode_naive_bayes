<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Barang</title>
    <link rel="stylesheet" href="stylepdf.css">
</head>
<body>
    <div class="container">
        <!-- Header, Info, and Table Sections here -->

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $totalFinalTB }}</td> <!-- Total dari TB -->
                    <td>10</td>
                    <td>Baik</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>{{ $totalFinalB }}</td> <!-- Total dari B -->
                    <td>0</td>
                    <td>Rusak</td>
                </tr>
            </tbody>
        </table>

        <!-- Remainder of the content here -->
    </div>
</body>
</html>
