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
                            <h4 class="card-title">PROBABILITAS</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">B</td>
                                        <td class="text-center align-middle">{{ $probabilitasBerpengaruh }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">TB</td>
                                        <td class="text-center align-middle">{{ $probabilitasTidakBerpengaruh }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4 class="card-title mt-5">SOSIAL MEDIA</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
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
                                                    <td class="text-center align-middle">{{ $instagramData }}</td>
                                                    <td class="text-center align-middle">{{ $instagramDataTB }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Facebook</td>
                                                    <td class="text-center align-middle">{{ $facebookData }}</td>
                                                    <td class="text-center align-middle">{{ $facebookDataTB }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Tiktok</td>
                                                    <td class="text-center align-middle">{{ $tiktokData }}</td>
                                                    <td class="text-center align-middle">{{ $tiktokDataTB }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <h4 class="card-title mt-5">Keuntungan</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Keuntungan</th>
                                                    <th class="text-center">B</th>
                                                    <th class="text-center">TB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center align-middle">Lebih dari Rp 1.000.000</td>
                                                    <td class="text-center align-middle">{{ $keuntunganSatuB }}</td>
                                                    <td class="text-center align-middle">{{ $keuntunganSatuTB }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Lebih dari Rp 500.000</td>
                                                    <td class="text-center align-middle">{{ $keuntunganDuaB }}</td>
                                                    <td class="text-center align-middle">{{ $keuntunganDuaTB }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">Kurang dari Rp 500.000</td>
                                                    <td class="text-center align-middle">{{ $keuntunganTigaB }}</td>
                                                    <td class="text-center align-middle">{{ $keuntunganTigaTB }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <h4 class="card-title mt-5">Pengaruh Event</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Pengaruh Event</th>
                                                    <th class="text-center">B</th>
                                                    <th class="text-center">TB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center align-middle">ya</td>
                                                    <td class="text-center align-middle">{{ $pengaruhEventSatuB }}</td>
                                                    <td class="text-center align-middle">{{ $pengaruhEventSatuTB }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">tidak</td>
                                                    <td class="text-center align-middle">{{ $pengaruhEventDuaB }}</td>
                                                    <td class="text-center align-middle">{{ $pengaruhEventDuaTB }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
