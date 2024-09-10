<table>
    <thead>
        <tr>
            <th>Nama Sosmed</th>
            <th>Value B</th>
            <th>Value TB</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hasil_prediksi->sosmeds as $sosmed)
            <tr>
            <td>{{ $sosmed->id }}</td>
                <td>{{ $sosmed->nama }}</td>
                <td>{{ $sosmed->b }}</td>
                <td>{{ $sosmed->tb }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
