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
                                <tbody>
                                    @foreach ($hasil_prediksi->sosmeds as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle"><button type="submit"
                                                    class="btn btn-primary">Add</button></td>
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
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil_prediksi->keuntungan as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle"><button type="submit"
                                                    class="btn btn-primary">Add</button></td>
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
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil_prediksi->pengaruh_event as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle"><button type="submit"
                                                    class="btn btn-primary">Add</button></td>
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
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil_prediksi->kenaikan_keuntungan as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle"><button type="submit"
                                                    class="btn btn-primary">Add</button></td>
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
                                                <form class="add-form">
                                                    @csrf
                                                    <input type="hidden" name="nama" value="{{ $data->nama }}">
                                                    <input type="hidden" name="b" value="{{ $data->b }}">
                                                    <input type="hidden" name="tb" value="{{ $data->tb }}">
                                                    <button type="submit" class="btn btn-primary">Add</button>
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
                                        <th class="text-center">Berpengaruh</th>
                                        <th class="text-center">Tidak Berpengaruh</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($hasil_prediksi->waktu as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $data->id }}</td>
                                            <td class="text-center align-middle">{{ $data->nama }}</td>
                                            <td class="text-center align-middle">{{ $data->b }}</td>
                                            <td class="text-center align-middle">{{ $data->tb }}</td>
                                            <td class="text-center align-middle"><button type="submit"
                                                    class="btn btn-primary">Add</button></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <h4 class="card-title mt-4">Added Products</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Berpengaruh</th>
                        <th class="text-center">Tidak Berpengaruh</th>
                    </tr>
                </thead>
                <tbody id="added-products-table-body">
                    <!-- Data yang ditambahkan akan muncul di sini -->
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var addedProductsTableBody = document.getElementById('added-products-table-body');

                document.querySelectorAll('.add-form').forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent the default form submission

                        // Ambil data dari form
                        var formData = new FormData(form);
                        var nama = formData.get('nama');
                        var b = formData.get('b');
                        var tb = formData.get('tb');

                        // Buat baris baru
                        var newRow = document.createElement('tr');
                        newRow.innerHTML = `<td class="text-center align-middle">${Date.now()}</td>
                                    <td class="text-center align-middle">${nama}</td>
                                    <td class="text-center align-middle">${b}</td>
                                    <td class="text-center align-middle">${tb}</td>`;

                        // Tambahkan baris baru ke tabel
                        addedProductsTableBody.appendChild(newRow);

                        // (Opsional) Kosongkan form setelah menambahkan
                        form.reset();
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Simpan posisi scroll di localStorage saat halaman dimuat
                if (localStorage.getItem('scrollPosition')) {
                    window.scrollTo(0, localStorage.getItem('scrollPosition'));
                    localStorage.removeItem('scrollPosition'); // Hapus setelah penggunaan
                }
            });

            window.addEventListener('beforeunload', function() {
                // Simpan posisi scroll saat halaman di-unload
                localStorage.setItem('scrollPosition', window.scrollY);
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (localStorage.getItem('scrollPosition')) {
                    window.scrollTo(0, localStorage.getItem('scrollPosition'));
                }
            });

            // Atur scroll ke posisi sebelumnya saat halaman dimuat
            window.addEventListener('beforeunload', function() {
                localStorage.setItem('scrollPosition', window.scrollY);
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
