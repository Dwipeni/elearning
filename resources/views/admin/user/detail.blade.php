@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.user.edit',Crypt::encrypt($user->id)) }}" class="btn btn-warning">
                        Edit 
                    </a>
                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.user.hapus',Crypt::encrypt($user->id)) }}')" class="btn btn-danger">
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
                                <td style="vertical-align: top">Deskripsi User</td>
                                <td style="vertical-align: top" class="px-2 py-1">:</td>
                                <td style="vertical-align: top">
                                    Saya user baru loh, senang bisa bergabung
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection