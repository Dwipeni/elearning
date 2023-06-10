@extends('layouts.front')
@section('content')

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Jadwal Kelas</h2>
                </div>
            </div>
        </div>
        <div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Tutor</th>
                                <th>Mata Pelajaran</th>
                                <th>Waktu Mengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <!-- <td></td> -->
                                <td>{{ $item->name_tutor }}</td>
                                <td>{{ $item->type_mapel }}</td>
                                <td>{{ $item->time_mapel }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div>
            <div class="col-md-12 d-flex justify-content-center">
                {{
                    $jadwal->links()
                }}
            </div>
        </div> -->
    </div>
</section>

@endsection