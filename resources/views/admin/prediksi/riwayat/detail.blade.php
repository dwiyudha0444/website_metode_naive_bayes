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

                        @if (auth()->user()->role == 'admin')
                            <a href="{{ url('riwayat_prediksi') }}" class="btn btn-primary">Kembali</a>
                        @elseif (auth()->user()->role == 'afiliator')
                            <a href="{{ url('riwayat_prediksi_aff') }}" class="btn btn-primary">Kembali</a>
                        @endif

                        @php
                            $no = 1;
                            $no1 = 1;
                            $no2 = 1;
                            $no3 = 1;
                            $no4 = 1;
                            $no5 = 1;
                            $no6 = 1;
                        @endphp
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
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
                                                        <td class="text-center align-middle">{{ $data->nilai }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Sosial Media</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                    <th class="text-center hidden"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="sosmed-table-body">
                                                @foreach ($hasil_prediksi->sosmeds as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no1++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-sosmed-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Keuntungan</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="keuntungan-table-body">
                                                @foreach ($hasil_prediksi->keuntungan as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no2++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-keuntungan-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Pengaruh Event</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pengaruh-event-table-body">
                                                @foreach ($hasil_prediksi->pengaruh_event as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no3++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-pengaruh-event-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Kenaikan Keuntungan</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden" >Tidak Berpengaruh</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="kenaikan-keuntungan-table-body">
                                                @foreach ($hasil_prediksi->kenaikan_keuntungan as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no4++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-kenaikan-keuntungan-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Produk</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="produk-table-body">
                                                @foreach ($hasil_prediksi->produk as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no5++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-product-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h4 class="card-title">Waktu</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="waktu-table-body">
                                                @foreach ($hasil_prediksi->waktu as $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $no6++ }}</td>
                                                        <td class="text-center align-middle">{{ $data->nama }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->b }}</td>
                                                        <td class="text-center align-middle hidden">{{ $data->tb }}</td>
                                                        <td class="text-center align-middle">
                                                            <form class="add-form"
                                                                data-target="selected-waktu-table-body">
                                                                @csrf
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $data->nama }}">
                                                                <input type="hidden" name="b"
                                                                    value="{{ $data->b }}">
                                                                <input type="hidden" name="tb"
                                                                    value="{{ $data->tb }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary add-button">Add</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <h3 class="mt-5">Data Terpilih</h3>
                                        <!-- Tabel Gabungan -->
                                        <table class="table table-bordered mt-2">
                                        
                                            <thead>
                                                <tr>
                                                    {{-- <th class="text-center">No</th> --}}
                                                    <th class="text-center">Kategori</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center hidden">Berpengaruh</th>
                                                    <th class="text-center hidden">Tidak Berpengaruh</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected-data-table-body">
                                                <!-- Data yang dipilih akan muncul di sini -->
                                            </tbody>
                                        </table>
                                        <form id="save-to-database-form" method="POST" action="/save-to-database">
                                            @csrf
                                            <input type="hidden" name="data" id="data-input">
                                            <button type="submit" class="btn btn-success">Hitung</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            function sendDataToServer() {
                                const tableIds = [
                                    'selected-sosmed-table-body',
                                    'selected-keuntungan-table-body',
                                    'selected-pengaruh-event-table-body',
                                    'selected-product-table-body',
                                    'selected-waktu-table-body',
                                    'selected-kenaikan-keuntungan-table-body'
                                ];


                                let allData = [];

                                tableIds.forEach(tableId => {
                                    let storedData = JSON.parse(localStorage.getItem(tableId)) || [];
                                    allData = allData.concat(storedData);
                                });

                                document.getElementById('data-input').value = JSON.stringify(allData);

                                document.getElementById('save-to-database-form').submit();
                            }

                            // Pasang event listener untuk tombol "Simpan ke Database"
                            document.querySelector('.btn-success').addEventListener('click', function(event) {
                                event.preventDefault(); // Mencegah form submit default
                                sendDataToServer();
                            });
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Fungsi untuk menyimpan data terpilih ke localStorage
                            function saveToLocalStorage(tableId, data) {
                                localStorage.setItem(tableId, JSON.stringify([data]));
                            }

                            // Fungsi untuk menampilkan data dari localStorage ke tabel gabungan
                            function displayStoredData() {
                                const tableIdMap = {
                                    'selected-sosmed-table-body': 'Sosial Media',
                                    'selected-keuntungan-table-body': 'Keuntungan',
                                    'selected-pengaruh-event-table-body': 'Pengaruh Event',
                                    'selected-product-table-body': 'Produk',
                                    'selected-waktu-table-body': 'Waktu',
                                    'selected-kenaikan-keuntungan-table-body': 'Kenaikan Keuntungan'
                                };


                                let targetTableBody = document.getElementById('selected-data-table-body');
                                let totalBerpengaruh = 1;
                                let totalTidakBerpengaruh = 1;
                                let hasData = false;

                                targetTableBody.innerHTML = ''; // Kosongkan tabel sebelum menampilkan data

                                Object.keys(tableIdMap).forEach(tableId => {
                                    let storedData = JSON.parse(localStorage.getItem(tableId)) || [];
                                    storedData.forEach(item => {
                                        let newRow = document.createElement('tr');
                                        newRow.innerHTML = `
                    <td class="text-center align-middle"  style="display: none;">${item.id}</td>
                    
                    <td class="text-center align-middle">${tableIdMap[tableId]}</td>
                    <td class="text-center align-middle">${item.nama}</td>
                    <td class="text-center align-middle hidden">${item.b}</td>
                    <td class="text-center align-middle hidden">${item.tb}</td>`;
                                        targetTableBody.appendChild(newRow);

                                        // Update total dengan perkalian
                                        if (parseFloat(item.b) && parseFloat(item.tb)) {
                                            totalBerpengaruh *= parseFloat(item.b);
                                            totalTidakBerpengaruh *= parseFloat(item.tb);
                                            hasData = true;
                                        }
                                    });
                                });

                                // Update total display
                                document.getElementById('total-berpengaruh').textContent = hasData ? totalBerpengaruh.toFixed(2) :
                                    '0.00';
                                document.getElementById('total-tidak-berpengaruh').textContent = hasData ? totalTidakBerpengaruh
                                    .toFixed(2) : '0.00';
                            }

                            function handleAddButtonClick(event) {
                                event.preventDefault(); // Mencegah submit form

                                var form = event.target.closest('form');
                                var targetTableBodyId = form.getAttribute('data-target');
                                var targetTableBody = document.getElementById(targetTableBodyId);

                                var tableBody = form.closest('tbody');
                                tableBody.querySelectorAll('.add-button').forEach(function(btn) {
                                    btn.classList.remove('btn-danger');
                                    btn.classList.add('btn-primary');
                                    btn.disabled = false;
                                });

                                event.target.classList.remove('btn-primary');
                                event.target.classList.add('btn-danger');
                                event.target.disabled = true;

                                var formData = new FormData(form);
                                var nama = formData.get('nama');
                                var b = formData.get('b');
                                var tb = formData.get('tb');

                                var data = {
                                    id: Date.now(),
                                    nama: nama,
                                    b: b,
                                    tb: tb
                                };

                                saveToLocalStorage(targetTableBodyId, data);
                                displayStoredData();
                            }

                            // Pasang event listener ke semua tombol "Add"
                            document.querySelectorAll('.add-button').forEach(function(button) {
                                button.addEventListener('click', handleAddButtonClick);
                            });

                            // Tampilkan data yang tersimpan saat halaman dimuat
                            displayStoredData();
                        });
                    </script>



                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All
                                rights
                                reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &
                                made with <i class="mdi mdi-heart text-danger"></i></span>
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
