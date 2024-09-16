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

            <a href="{{ url('riwayat_prediksi') }}" class="btn btn-primary">Kembali</a>

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
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil_prediksi->kelas as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
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
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sosmed-table-body">
                                    @foreach ($hasil_prediksi->sosmeds as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle">
                                                <form class="add-form" data-target="selected-sosmed-table-body">
                                                    @csrf
                                                    <input type="hidden" name="nama" value="{{ $data->nama }}">
                                                    <input type="hidden" name="b" value="{{ $data->b }}">
                                                    <input type="hidden" name="tb" value="{{ $data->tb }}">
                                                    <button type="submit" class="btn btn-primary add-button">Add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="card-title mt-4">Selected Sosial Media</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-sosmed-table-body">
                                    <!-- Data yang dipilih akan muncul di sini -->
                                </tbody>
                            </table>



                            <h4 class="card-title">Keuntungan</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="keuntungan-table-body">
                                    @foreach ($hasil_prediksi->keuntungan as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle">
                                                <form class="add-form" data-target="selected-keuntungan-table-body">
                                                    @csrf
                                                    <input type="hidden" name="nama" value="{{ $data->nama }}">
                                                    <input type="hidden" name="b" value="{{ $data->b }}">
                                                    <input type="hidden" name="tb" value="{{ $data->tb }}">
                                                    <button type="submit" class="btn btn-primary add-button">Add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="card-title mt-4">Selected Keuntungan</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-keuntungan-table-body">
                                    <!-- Data yang dipilih akan muncul di sini -->
                                </tbody>
                            </table>

                            <!-- Tabel-tabel lainnya mengikuti pola yang sama -->

                            <h4 class="card-title">Pengaruh Event</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pengaruh-event-table-body">
                                    @foreach ($hasil_prediksi->pengaruh_event as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle">
                                                <form class="add-form" data-target="selected-pengaruh-event-table-body">
                                                    @csrf
                                                    <input type="hidden" name="nama" value="{{ $data->nama }}">
                                                    <input type="hidden" name="b" value="{{ $data->b }}">
                                                    <input type="hidden" name="tb" value="{{ $data->tb }}">
                                                    <button type="submit" class="btn btn-primary add-button">Add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="card-title mt-4">Selected Pengaruh Event</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-pengaruh-event-table-body">
                                    <!-- Data yang dipilih akan muncul di sini -->
                                </tbody>
                            </table>


                            <h4 class="card-title">Produk</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="produk-table-body">
                                    @foreach ($hasil_prediksi->produk as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle">
                                                <form class="add-form" data-target="selected-product-table-body">
                                                    @csrf
                                                    <input type="hidden" name="nama" value="{{ $data->nama }}">
                                                    <input type="hidden" name="b" value="{{ $data->b }}">
                                                    <input type="hidden" name="tb" value="{{ $data->tb }}">
                                                    <button type="submit" class="btn btn-primary add-button">Add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="card-title mt-4">Selected Product</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-product-table-body">
                                    <!-- Data yang dipilih akan muncul di sini -->
                                </tbody>
                            </table>



                            <!-- Tabel Gabungan -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                    </tr>
                                </thead>
                                <tbody id="selected-data-table-body">
                                    <!-- Data yang dipilih akan muncul di sini -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-center">Total</th>
                                        <th id="total-berpengaruh" class="text-center"></th>
                                        <th id="total-tidak-berpengaruh" class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <form id="save-to-database-form" method="POST" action="/save-to-database">
                                @csrf
                                <input type="hidden" name="data" id="data-input">
                                <button type="submit" class="btn btn-success">Simpan ke Database</button>
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
                'selected-product-table-body'
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
                        'selected-product-table-body': 'Produk'
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
                    <td class="text-center align-middle">${item.id}</td>
                    <td class="text-center align-middle">${tableIdMap[tableId]}</td>
                    <td class="text-center align-middle">${item.nama}</td>
                    <td class="text-center align-middle">${item.b}</td>
                    <td class="text-center align-middle">${item.tb}</td>`;
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
