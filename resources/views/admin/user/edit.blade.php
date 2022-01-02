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
                <form action="{{ route('admin.user.update',Crypt::encrypt($user->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email User</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password User</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="{{ Crypt::encrypt('0') }}" {{ $user->role == 0 ? 'selected' : '' }}>Regular</option>
                            <option value="{{ Crypt::encrypt('1') }}" {{ $user->role == 1 ? 'selected' : '' }}>Premium</option>
                            <option value="{{ Crypt::encrypt('2') }}" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Perbaharui User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection