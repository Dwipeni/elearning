@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }} {{ $pendaftaran->nama_pendaftar }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.pendaftaran.edit',Crypt::encrypt($pendaftaran->id)) }}" class="btn btn-warning">
                        Edit 
                    </a>
                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.pendaftaran.hapus',Crypt::encrypt($pendaftaran->id)) }}')" class="btn btn-danger">
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
                                <td>Nama Pendaftar</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->nama_pendaftar !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->tgl_lahir !!}
                                </td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->no_hp !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenjang Sekolah</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->jenjang_sekolah !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelas</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->jenis_kelas !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->alamat_rumah !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Orangtua/Wali</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->nama_ortu !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->no_rekening !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Rekening Atas Nama</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->atas_nama !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Bukti Transfer</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->bukti_transfer !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td class="px-2 py-1">:</td>
                                <td>{!! $pendaftaran->status !!}
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