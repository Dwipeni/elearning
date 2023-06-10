@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.pendaftaran.tambah') }}" class="btn btn-primary">
                        Tambah
                    </a>
                    <a href="{{ route('admin.pendaftaran.pendaftaran_pdf') }}" class="btn btn-primary">
                        Print
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pendaftar</th>
                                <th>No Hp</th>
                                <th>Jenis Kelas</th>
                                <th>Status</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->nama_pendaftar }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->jenis_kelas }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('admin.pendaftaran.detail',Crypt::encrypt($item->id)) }}"
                                        class="btn btn-warning">Detail</a>
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