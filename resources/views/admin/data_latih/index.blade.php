@extends('admin.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header mt-5">
                <h3 class="page-title"> Basic Tables </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Keuntungan</h4>
                            <a href="{{ route('store_data_latih') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" fill="currentColor" title="Tambah Data Film" class="bi bi-bookmark-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
                                </svg></a>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th> # </th>
                                        <th> Nama </th>
                                        <th> Sosial Media </th>
                                        <th> Keuntungan </th>
                                        <th> Pengaruh Event </th>
                                        <th> Produk </th>
                                        <th> Waktu </th>
                                        <th> Kelas </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($datalatih as $use)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            @empty($use->biodata->nama)
                                                <td>
                                                    <p>kosong</p>
                                                </td>
                                            @else
                                                <td>{{ $use->biodata->nama }}</td>
                                            @endempty

                                            <td>{{ $use->sosmed }}</td>
                                            <td>{{ $use->keuntungan }}</td>
                                            <td>{{ $use->pengaruh_event }}</td>
                                            <td>{{ $use->produk }}</td>
                                            <td>{{ $use->waktu }}</td>
                                            <td>{{ $use->kelas }}</td>
                                            <td>

                                                <form method="POST" action="{{ route('destroy_data_latih', $use->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>

                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ url('form_data_latih_edit', $use->id) }}">Edit</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <style>
                                /* Mengatur kontainer untuk teks tengah */
                                .chart-container {
                                    text-align: center;
                                    /* Menempatkan elemen di tengah secara horizontal */
                                    margin-top: 20px;
                                    /* Menambahkan jarak di atas grafik */
                                }

                                /* Kontainer untuk tabel dan grafik */
                                .flex-container {
                                    display: flex;
                                    /* Mengatur kontainer sebagai flex */
                                    justify-content: space-between;
                                    /* Menjaga jarak antara tabel dan grafik */
                                    align-items: flex-start;
                                    /* Menjaga agar tabel dan grafik sejajar di bagian atas */
                                    margin: 20px;
                                    /* Jarak di sekitar kontainer */
                                }

                                /* Tabel dan Chart */
                                .table-container {
                                    flex: 1;
                                    /* Mengatur agar tabel mengambil ruang yang tersedia */
                                    margin-right: 20px;
                                    /* Jarak antara tabel dan grafik */
                                }

                                .chart-container {
                                    flex: 1;
                                    /* Mengatur agar grafik mengambil ruang yang tersedia */
                                }

                                /* Ukuran canvas */
                                canvas {
                                    display: block;
                                    /* Membuat elemen block untuk margin auto bekerja */
                                    margin: 0 auto;
                                    /* Menempatkan chart di tengah secara horizontal */
                                    width: 100%;
                                    /* Lebar 100% dari kontainer */
                                    height: 300px;
                                    /* Mengatur tinggi tetap */
                                }

                                table {
                                    width: 100%;
                                    /* Memastikan tabel menggunakan seluruh lebar */
                                    margin-bottom: 20px;
                                    /* Jarak antara tabel dan grafik */
                                }
                            </style>

                            <div class="flex-container">
                                <div class="table-container">
                                    <!-- Tabel untuk Total Sosmed -->
                                    <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sosmed</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sosmedTotals as $data)
                                                <tr>
                                                    <td>{{ $data->sosmed }}</td>
                                                    <td>{{ $data->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Tabel untuk Keuntungan -->
                                    <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Keuntungan</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($keuntungan as $data)
                                                <tr>
                                                    <td>{{ $data->keuntungan }}</td>
                                                    <td>{{ $data->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Tabel untuk Pengaruh Event -->
                                    <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Pengaruh Event</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengaruh_event as $data)
                                                <tr>
                                                    <td>{{ $data->pengaruh_event }}</td>
                                                    <td>{{ $data->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Tabel untuk Kenaikan Keuntungan -->
                                    <table class="mt-5 table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kenaikan Keuntungan</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kenaikan_keuntungan as $data)
                                                <tr>
                                                    <td>{{ $data->kenaikan_keuntungan }}</td>
                                                    <td>{{ $data->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="chart-container">
                                    <canvas id="sosmedChart"></canvas>
                                    <canvas id="keuntunganChart"></canvas>
                                    <canvas id="pengaruhEventChart"></canvas>
                                    <canvas id="kenaikanKeuntunganChart"></canvas>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                // Grafik untuk Total Sosmed
                                var ctx1 = document.getElementById('sosmedChart').getContext('2d');
                                var sosmedChart = new Chart(ctx1, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            @foreach ($sosmedTotals as $data)
                                                "{{ $data->sosmed }}",
                                            @endforeach
                                        ],
                                        datasets: [{
                                            label: 'Total Sosmed',
                                            data: [
                                                @foreach ($sosmedTotals as $data)
                                                    {{ $data->total }},
                                                @endforeach
                                            ],
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        maintainAspectRatio: true,
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                // Grafik untuk Keuntungan
                                var ctx2 = document.getElementById('keuntunganChart').getContext('2d');
                                var keuntunganChart = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            @foreach ($keuntungan as $data)
                                                "{{ $data->keuntungan }}",
                                            @endforeach
                                        ],
                                        datasets: [{
                                            label: 'Total Keuntungan',
                                            data: [
                                                @foreach ($keuntungan as $data)
                                                    {{ $data->total }},
                                                @endforeach
                                            ],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        maintainAspectRatio: true,
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                // Grafik untuk Pengaruh Event
                                var ctx3 = document.getElementById('pengaruhEventChart').getContext('2d');
                                var pengaruhEventChart = new Chart(ctx3, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            @foreach ($pengaruh_event as $data)
                                                "{{ $data->pengaruh_event }}",
                                            @endforeach
                                        ],
                                        datasets: [{
                                            label: 'Total Pengaruh Event',
                                            data: [
                                                @foreach ($pengaruh_event as $data)
                                                    {{ $data->total }},
                                                @endforeach
                                            ],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        maintainAspectRatio: true,
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                // Grafik untuk Kenaikan Keuntungan
                                var ctx4 = document.getElementById('kenaikanKeuntunganChart').getContext('2d');
                                var kenaikanKeuntunganChart = new Chart(ctx4, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            @foreach ($kenaikan_keuntungan as $data)
                                                "{{ $data->kenaikan_keuntungan }}",
                                            @endforeach
                                        ],
                                        datasets: [{
                                            label: 'Total Kenaikan Keuntungan',
                                            data: [
                                                @foreach ($kenaikan_keuntungan as $data)
                                                    {{ $data->total }},
                                                @endforeach
                                            ],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        maintainAspectRatio: true,
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>



                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a
                        href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights
                    reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->


    </div>
@endsection
