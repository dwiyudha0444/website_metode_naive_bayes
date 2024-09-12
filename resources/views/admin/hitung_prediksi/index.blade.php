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
                            <h4 class="card-title">Hitung Prediksi</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample" method="POST" action="{{ route('store_hasil_hitung_prediksi') }}"
                                enctype="multipart/form-data" id="filterForm">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Pilih Bulan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="bulan" id="bulanSelect">
                                            <option selected>-- Pilih Bulan --</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('bulan', $selectedBulan ?? '') == $i ? 'selected' : '' }}>
                                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Sosial Media</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_sosmed">
                                           <option value='1' selected>-- Pilih Sosial Media --</option>
                                            @foreach ($relasi_sosmed as $ob)
                                                <option value="{{ $ob->id }}"
                                                    {{ old('id_sosmed') == $ob->id ? 'selected' : '' }}>
                                                    {{ $ob->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Keuntungan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="id_keuntungan" id="sosmedSelect">
                                            <option value='1' selected>-- Pilih Sosial Media --</option>
                                            @foreach ($relasi_keuntungan as $ob)
                                                <option value="{{ $ob->id }}"
                                                    {{ old('id_keuntungan') == $ob->id ? 'selected' : '' }}>
                                                    {{ $ob->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>

                            <script>
                                // Kirim form otomatis ketika bulan diubah
                                document.getElementById('bulanSelect').addEventListener('change', function() {
                                    document.getElementById('filterForm').submit();
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
