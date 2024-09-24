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
                            <h4 class="card-title">Biodata</h4>
                            <a href="{{ route('biodata_form') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" fill="currentColor" title="Tambah Data Film" class="bi bi-bookmark-plus"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
                                </svg></a>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th> # </th>
                                        <th> Nama </th>
                                        <th> Umur </th>
                                        <th> Waktu Bergabung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @foreach ($biodata as $bio)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>

                                            <td>{{ $bio->nama }}</td>
                                            <td>{{ Carbon::parse($bio->umur)->age }}</td>
                                            <td>{{ $bio->waktu_bergabung }}</td>
                                            <td>

                                                <form method="POST" action="{{ route('biodata_destroy', $bio->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-gradient-danger btn-fw"
                                                        style="font-size: 12px; padding: 15px 12px;">Hapus</button>

                                                    <a class="btn btn-gradient-primary btn-fw"
                                                        href="{{ route('biodata_edit', $bio->id) }}">Edit</a>
                                                </form>
                                            </td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
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
