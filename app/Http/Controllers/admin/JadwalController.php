<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jadwal',
            'jadwal' => Jadwal::all()
        ];

        return view('admin.jadwal.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Jadwal',
        ];
        return view('admin.jadwal.tambah', $data);
    }

    public function simpan(Request $request)
    {

        $validator = Validator($request->all(), [
            'name_tutor' => 'required',
            'type_mapel' => 'required',
            'time_mapel' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.jadwal.tambah')->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name_tutor' => $request->name_tutor,
                'type_mapel' => $request->type_mapel,
                // 'type_mapel' => Crypt::decrypt($request->type_mapel),
                'time_mapel' => $request->time_mapel,
            ];
            Jadwal::insert($obj);
            return redirect()->route('admin.jadwal')->with('status', 'Berhasil Menambah Jadwal Baru');
        }
    }

    public function hapus($id)
    {
        $dec_id = Crypt::decrypt($id);
        $jadwal = Jadwal::find($dec_id);
        $jadwal->delete();
        return redirect()->route('admin.jadwal')->with('status', 'Berhasil Menghapus Jadwal');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Jadwal',
            'jadwal' => Jadwal::find($dec_id)
        ];
        return view('admin.jadwal.edit', $data);
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail Jadwal',
            'jadwal' => Jadwal::find($dec_id)
        ];
        return view('admin.jadwal.detail', $data);
    }

    public function update(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $validator = Validator($request->all(), [
            'name_tutor' => 'required',
            'type_mapel' => 'required',
            'time_mapel' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.jadwal.edit', $id)->withErrors($validator)->withInput();
        } else {
            $jadwal = Jadwal::find($dec_id);
            $jadwal->name_tutor = $request->name_kelas;
            $jadwal->type_mapel = $request->type_kelas;
            // $jadwal->type_mapel = Crypt::decrypt($request->type_kelas);
            $jadwal->time_mapel = $request->time_mapel;
            $jadwal->save();
            return redirect()->route('admin.jadwal.detail',$id)->with('status', 'Berhasil Memperbarui Jadwal');
        }
    }
}
