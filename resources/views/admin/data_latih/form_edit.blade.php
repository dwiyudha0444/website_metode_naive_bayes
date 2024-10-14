@extends('admin.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header mt-5">
                <h3 class="page-title"> Form </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form </li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Keuntungan</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample" method="POST"
                                action="{{ route('update_data_latih', $datalatih->id) }}"
                                enctype="multipart/form-datalatih">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_biodata">
                                            <option value="">-- Pilih biodata --</option>
                                            @foreach ($rel_biodata as $ob)
                                                <option value="{{ $ob->id }}"
                                                    @if (old('id_biodata', $datalatih->id_biodata) == $ob->id) selected @endif>
                                                    {{ $ob->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sosmed" class="col-sm-3 col-form-label">Sosial Media</label>
                                    <div class="col-sm-9">
                                        <select name="sosmed" class="form-select" id="sosmed">
                                            <option value="">-- Pilih Sosial Media --</option>
                                            <option value="facebook"
                                                {{ old('sosmed', $datalatih->sosmed) == 'facebook' ? 'selected' : '' }}>
                                                Facebook
                                            </option>
                                            <option value="instagram"
                                                {{ old('sosmed', $datalatih->sosmed) == 'instagram' ? 'selected' : '' }}>
                                                Instagram
                                            </option>
                                            <option value="tiktok"
                                                {{ old('sosmed', $datalatih->sosmed) == 'tiktok' ? 'selected' : '' }}>
                                                Tiktok
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Keuntungan</label>
                                    <div class="col-sm-9">
                                        <select name="keuntungan" class="form-select" id="keuntungan">
                                            <option value="">-- Pilih Keuntungan --</option>
                                            <option value="Lebih dari Rp 1.000.000"
                                                {{ old('keuntungan', $datalatih->keuntungan) == 'Lebih dari Rp 1.000.000' ? 'selected' : '' }}>
                                                Lebih dari Rp 1.000.000
                                            </option>
                                            <option value="Lebih dari Rp 500.000"
                                                {{ old('keuntungan', $datalatih->keuntungan) == 'Lebih dari Rp 500.000' ? 'selected' : '' }}>
                                                Lebih dari Rp 500.000
                                            </option>
                                            <option value="Kurang dari Rp 500.000"
                                                {{ old('keuntungan', $datalatih->keuntungan) == 'Kurang dari Rp 500.000' ? 'selected' : '' }}>
                                                Kurang dari Rp 500.000
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Pengaruh Event</label>
                                    <div class="col-sm-9">
                                        <select name="pengaruh_event" class="form-select" id="pengaruh_event">
                                            <option value="">-- Pilih Pengaruh Event --</option>
                                            <option value="ya"
                                                {{ old('pengaruh_event', $datalatih->pengaruh_event) == 'ya' ? 'selected' : '' }}>
                                                ya
                                            </option>
                                            <option value="mungkin"
                                                {{ old('pengaruh_event', $datalatih->pengaruh_event) == 'mungkin' ? 'selected' : '' }}>
                                                mungkin
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kenaikan
                                        Keuntungan</label>
                                    <div class="col-sm-9">
                                        <select name="kenaikan_keuntungan" class="form-select" id="kenaikan_keuntungan">
                                            <option value="">-- Pilih Kenaikan Keuntungan --</option>
                                            <option value="Lebih dari Rp 200.000"
                                                {{ old('kenaikan_keuntungan', $datalatih->kenaikan_keuntungan) == 'Lebih dari Rp 1.000.000' ? 'selected' : '' }}>
                                                Lebih dari Rp 200.000
                                            </option>
                                            <option value="Lebih dari Rp 50.000"
                                                {{ old('kenaikan_keuntungan', $datalatih->kenaikan_keuntungan) == 'Lebih dari Rp 500.000' ? 'selected' : '' }}>
                                                Lebih dari Rp 50.000
                                            </option>
                                            <option value="Kurang dari Rp 150.000"
                                                {{ old('kenaikan_keuntungan', $datalatih->kenaikan_keuntungan) == 'Kurang dari Rp 500.000' ? 'selected' : '' }}>
                                                Kurang dari Rp 150.000
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Produk</label>
                                    <div class="col-sm-9">
                                        <select name="produk" class="form-select" id="produk">
                                            <option value="">-- Pilih Produk --</option>
                                            <option value="FAF"
                                                {{ old('produk', $datalatih->produk) == 'FAF' ? 'selected' : '' }}>
                                                FAF
                                            </option>
                                            <option value="KPD"
                                                {{ old('produk', $datalatih->produk) == 'KPD' ? 'selected' : '' }}>
                                                KPD
                                            </option>
                                            <option value="PSH"
                                                {{ old('produk', $datalatih->produk) == 'PSH' ? 'selected' : '' }}>
                                                PSH
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Waktu</label>
                                    <div class="col-sm-9">
                                        <select name="waktu" class="form-select" id="waktu">
                                            <option value="">-- Pilih Waktu --</option>
                                            <option value="1"
                                                {{ old('waktu', $datalatih->waktu) == '1' ? 'selected' : '' }}>
                                                1
                                            </option>
                                            <option value="2"
                                                {{ old('waktu', $datalatih->waktu) == '2' ? 'selected' : '' }}>
                                                2
                                            </option>
                                            <option value="3"
                                                {{ old('waktu', $datalatih->waktu) == '3' ? 'selected' : '' }}>
                                                3
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kelas</label>
                                    <div class="col-sm-9">
                                        <select name="kelas" class="form-select" id="kelas">
                                            <option value="">-- Pilih Kelas --</option>
                                            <option value="B"
                                                {{ old('kelas', $datalatih->kelas) == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="TB"
                                                {{ old('kelas', $datalatih->kelas) == 'TB' ? 'selected' : '' }}>
                                                TB
                                            </option>
                                        </select>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-gradient-primary me-2">Edit</button>
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
