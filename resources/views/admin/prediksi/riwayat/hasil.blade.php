@include('admin.head')

<body>
    <div class="container-scroller">
        @include('admin.navbar')

        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
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
                        <a href="{{ route('download_pdf') }}" class="btn btn-primary btn-sm">Download PDF</a>

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Hasil Prediksi</h4>
                                        {{-- <a href="{{ route('store_data_latih') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" fill="currentColor" title="Tambah Data Film" class="bi bi-bookmark-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
                                </svg></a> --}}
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
                                                    <th> Berpengaruh </th>
                                                    <th> Tidak Berpengaruh </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $use)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>

                                                        <td>{{ $use->nama }}</td>
                                                        <td style="color: green;">{{ $use->b }}</td>
                                                        <td style="color: green;">{{ $use->tb }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Kelas</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hasil_prediksi->kelas as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td style="color: green;" class="text-center align-middle">
                                                            {{ $data->nilai }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <p class="mt-5">Hasil Nilai Berpengaruh adalah {{ $totalFinalB }}</p>
                                        <p>Hasil Nilai Tidak Berpengaruh adalah {{ $totalFinalTB }}</p>

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

                                        <!-- Form untuk tombol Riset -->
                                        <form class="mt-3" method="POST" action="{{ route('destroy_all') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Riset</button>
                                        </form>

                                        <!-- Form untuk tombol Save -->
                                        <form class="mt-3" method="POST" action="{{ route('save_data_prediksi') }}">
                                            @csrf
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data5 as $use)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $use->nama }}</td>
                                                            <td style="color: green;">{{ $use->b }}</td>
                                                            <td style="color: green;">{{ $use->tb }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input  name="nama[]"
                                                                    value="{{ $use->nama }}">
                                                                <input  name="berpengaruh[]"
                                                                    value="{{ $use->b }}">
                                                                <input  name="tidak_berpengaruh[]"
                                                                    value="{{ $use->tb }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered">
                                                <tbody>
                                                    @foreach ($hasil_prediksi->kelas as $data)
                                                        <tr>
                                                            <td class="text-center align-middle">{{ $no++ }}
                                                            </td>
                                                            <td class="text-center align-middle">{{ $data->nama }}
                                                            </td>
                                                            <td style="color: green;" class="text-center align-middle">
                                                                {{ $data->nilai }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input  name="kelas[]"
                                                                    value="{{ $data->nama }}">
                                                                <input  name="nilai[]"
                                                                    value="{{$data->nilai }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        </form>






                                        <div class="mt-3 p-3 alert" id="custom-alert"
                                            style="background-color: #28a745; color: white; position: relative;">
                                            <p>Catatan !!!</p>
                                            <span class="close-btn" onclick="closeAlert()"
                                                style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 20px;">&times;</span>
                                        </div>

                                        <script>
                                            function closeAlert() {
                                                var alert = document.getElementById("custom-alert");
                                                alert.style.display = "none";
                                            }
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
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023
                                <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights
                                reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                                with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>

            </div>
        </div>
        @include('admin.footer')

        @include('admin.script')
    </div>
</body>
