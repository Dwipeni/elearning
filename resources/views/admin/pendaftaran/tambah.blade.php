@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <button id="btn-back" class="btn btn-primary">
                        Kembali
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pendaftaran.simpan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pendaftar">Nama Lengkap</label>
                        <input id="nama_pendaftar" type="text" class="form-control @error('nama_pendaftar') is-invalid @enderror"
                            name="nama_pendaftar" value="{{ old('nama_pendaftar') }}" required autocomplete="nama_pendaftar" autofocus>

                        @error('nama_pendaftar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="date" class="form-control @error('tgl_lahir') is-invalid @enderror" style="width: 100%; display: inline;" onchange="invoicedue(event);" required value="{{ old('tgl_lahir') }}">
                        @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor Hp</label>
                        <input id="no_hp" type="no_hp"
                            class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required
                            autocomplete="no_hp">

                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenjang_sekolah">Jenjang Sekolah</label>
                        <input id="jenjang_sekolah" type="jenjang_sekolah" class="form-control" name="jenjang_sekolah"
                            required autocomplete="jenjang_sekolah">

                        @error('jenjang_sekolah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelas">Jenis Kelas</label>
                        <input id="jenis_kelas" type="jenis_kelas" class="form-control" name="jenis_kelas"
                            required autocomplete="jenis_kelas">

                        @error('jenis_kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <input id="alamat_rumah" type="alamat_rumah" class="form-control" name="alamat_rumah"
                            required autocomplete="alamat_rumah">

                        @error('alamat_rumah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_ortu">Nama Orangtua/Wali</label>
                        <input id="nama_ortu" type="nama_ortu" class="form-control" name="nama_ortu"
                            required autocomplete="alamat_rumah">

                        @error('nama_ortu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_rekening">Nomor Rekening</label>
                        <input id="no_rekening" type="no_rekening" class="form-control" name="no_rekening"
                            required autocomplete="no_rekening">

                        @error('no_rekening')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="atas_nama">Rekening Atas Nama</label>
                        <input id="atas_nama" type="atas_nama" class="form-control" name="atas_nama"
                            required autocomplete="atas_nama">

                        @error('atas_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="atas_nama">Upload Bukti Transfer</label>
                            <input type="file" class="form-control" name="atas_nama">
                            @error('atas_nama')
                            <small class="mt-2 text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <!-- <label for="bukti_transfer">Upload Bukti Transfer</label>
                        <input id="bukti_transfer" type="bukti_transfer" class="form-control" name="bukti_transfer"
                            required autocomplete="bukti_transfer">

                        @error('bukti_transfer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror -->
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="{{ Crypt::encrypt('0') }}">Belum Terdaftar</option>
                            <option value="{{ Crypt::encrypt('1') }}">Terdaftar</option>
                        </select>
                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Simpan Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection