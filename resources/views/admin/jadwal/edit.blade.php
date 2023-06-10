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
                <form action="{{ route('admin.jadwal.update',Crypt::encrypt($jadwal->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Tutor</label>
                        <input type="text" name="name_tutor" class="form-control @error('name_tutor') is-invalid @enderror" value="{{ $jadwal->name_tutor }}">
                        @error('name_tutor')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <input type="text" name="type_mapel" class="form-control @error('type_mapel') is-invalid @enderror" value="{{ $jadwal->type_mapel }}">
                        @error('type_mapel')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Mengajar</label>
                        <input type="date" name="time_mapel" id="date" class="form-control @error('time_mapel') is-invalid @enderror" style="width: 100%; display: inline;" onchange="invoicedue(event);" value="{{ $jadwal->time_mapel }}">
                        @error('time_mapel')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Perbaharui Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection