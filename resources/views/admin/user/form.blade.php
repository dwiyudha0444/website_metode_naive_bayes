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
                            <h4 class="card-title">Tambah User</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample" method="POST" action="{{ route('store_user') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputEmail2"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputMobile"
                                            placeholder="Mobile number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputPassword2"
                                            placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputConfirmPassword2"
                                            placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> Remember me </label>
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
                        href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
