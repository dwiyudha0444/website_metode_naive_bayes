@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <div class="page-header mt-5">
            <h3 class="page-title">Daftar PDF Hasil Prediksi</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Download PDF</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Prediksi</th>
                                    <th>PDF Path</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arsip as $index => $arsip)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $arsip->nama ?? 'Nama tidak tersedia' }}</td>
                                        <td>{{ $arsip->pdf_path }}</td>
                                        <td>
                                            @if ($arsip->pdf_path)
                                                <a href="{{ url($arsip->pdf_path) }}" target="_blank" class="btn btn-primary btn-sm">Download PDF</a>
                                            @else
                                                <span class="text-muted">PDF belum tersedia</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
