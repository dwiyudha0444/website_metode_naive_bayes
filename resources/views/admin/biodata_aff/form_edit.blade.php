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
                            <h4 class="card-title">Edit Biodata</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample" method="POST" action="{{ route('biodata_update', $biodata->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" value="{{ $biodata->nama }}"
                                            class="form-control" id="exampleInputMobile" placeholder="Nama">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="umur" value="{{ $biodata->umur }}"
                                            class="form-control" id="exampleInputMobile" placeholder="Nama">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Waktu Bergabung</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="waktu_bergabung" value="{{ $biodata->waktu_bergabung }}"
                                            class="form-control" id="exampleInputMobile">
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
                        href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
