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
                            <h4 class="card-title mt-5">SOSIAL MEDIA</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Sosial Media</th>
                                                    <th class="text-center">B</th>
                                                    <th class="text-center">TB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center align-middle">Instagram</td>
                                                    <td class="text-center align-middle">{{ $hasil_prediksi->id_sosmed }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @foreach ($hasil_prediksi->sosmeds as $sosmed)
                                                            <li>{{ $sosmed->b }}</li>
                                                            <!-- Akses atribut 'b' dari setiap item dalam koleksi -->
                                                        @endforeach
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Facebook</td>
                                                    <td class="text-center align-middle"></td>
                                                    <td class="text-center align-middle"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Tiktok</td>
                                                    <td class="text-center align-middle"></td>
                                                    <td class="text-center align-middle"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <form class="mt-5" action="" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-primary">Simpan</button>
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
