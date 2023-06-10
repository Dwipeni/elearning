@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }} {{ $jadwal->name_tutor }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.jadwal.edit',Crypt::encrypt($jadwal->id)) }}" class="btn btn-warning">
                        Edit 
                    </a>
                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.jadwal.hapus',Crypt::encrypt($jadwal->id)) }}')" class="btn btn-danger">
                        Hapus 
                    </a>
                    <button id="btn-back" class="btn btn-primary">
                        Kembali
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <table>
                            <tr>
                                <td>Nama Tutor</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $jadwal->name_tutor !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $jadwal->type_mapel !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Waktu Mengajar</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $jadwal->time_mapel !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Tutor</th>
                                <th>Mata Pelajaran</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection