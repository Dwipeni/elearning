@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.user.tambah') }}" class="btn btn-primary">
                        Tambah
                    </a>
                    <a href="{{ route('admin.user.user_pdf') }}" class="btn btn-primary">
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
                                <th>Nama User</th>
                                <th>Email</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('admin.user.detail',Crypt::encrypt($item->id)) }}"
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