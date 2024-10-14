@extends('admin.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header mt-5">
                <h3 class="page-title"> Form elements </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Keuntungan</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample" method="POST" action="{{ route('store_data_latih') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ID Pengguna</label>
                                    <div class="col-sm-9">
                                        <!-- Input field untuk menampilkan id pengguna yang sedang login -->
                                        <input type="text" class="form-control" name="id_biodata"
                                            value="{{ Auth::user()->id }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sosmed" class="col-sm-3 col-form-label">Sosial Media</label>
                                    <div class="col-sm-9">
                                        <select name="sosmed" class="form-select" id="sosmed">
                                            <option value="">-- Pilih Sosial Media --</option>
                                            <option value="facebook">
                                                Facebook</option>
                                            <option value="instagram">
                                                Instagram</option>
                                            <option value="tiktok">
                                                Tiktok</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Keuntungan</label>
                                    <div class="col-sm-9">
                                        <select name="keuntungan" class="form-select" id="keuntungan">
                                            <option value="">-- Pilih Keuntungan --</option>
                                            <option value="Lebih dari Rp 1.000.000">
                                                Lebih dari Rp 1.000.000</option>
                                            <option value="Lebih dari Rp 500.000">
                                                Lebih dari Rp 500.000</option>
                                            <option value="Kurang dari Rp 500.000">
                                                Kurang dari Rp 500.000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Pengaruh Event</label>
                                    <div class="col-sm-9">
                                        <select name="pengaruh_event" class="form-select" id="pengaruh_event">
                                            <option value="">-- Pilih Pengaruh Event--</option>
                                            <option value="ya">
                                                ya</option>
                                            <option value="mungkin">
                                                mungkin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kenaikan
                                        Keuntungan</label>
                                    <div class="col-sm-9">
                                        <select name="kenaikan_keuntungan" class="form-select" id="kenaikan_keuntungan">
                                            <option value="">-- Pilih Kenaikan Keuntungan --</option>
                                            <option value="Lebih dari Rp 200.000">
                                                Lebih dari Rp 200.000</option>
                                            <option value="Lebih dari Rp 50.000">
                                                Lebih dari Rp 50.000</option>
                                            <option value="Kurang dari Rp 150.00">
                                                Kurang dari Rp 150.000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Produk</label>
                                    <div class="col-sm-9">
                                        <select name="produk" class="form-select" id="produk">
                                            <option value="">-- Pilih Produk--</option>
                                            <option value="FAF">
                                                FAF</option>
                                            <option value="KPD">
                                                KPD</option>
                                            <option value="PSH">
                                                PSH</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Waktu</label>
                                    <div class="col-sm-9">
                                        <select name="waktu" class="form-select" id="waktu">
                                            <option value="">-- Pilih Waktu--</option>
                                            <option value="1">
                                                1</option>
                                            <option value="2">
                                                2</option>
                                            <option value="3">
                                                3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kelas</label>
                                    <div class="col-sm-9">
                                        <select name="kelas" class="form-select" id="kelas">
                                            <option value="">-- Pilih Kelas --</option>
                                            <option value="B">
                                                B</option>
                                            <option value="TB">
                                                TB</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
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
