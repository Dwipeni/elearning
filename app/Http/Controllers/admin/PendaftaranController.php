<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pendaftaran',
            'user' => Pendaftaran::all()
        ];
        return view('admin.pendaftaran.index',$data);
    }

    // public function belumdicek()
    // {
    //     $data = [
    //         'title' => 'Pendaftaran Belum Dicek ',
    //         'pendaftaran' => Pendaftaran::where(['status' => 0])->get(),
    //     ];
    //     return view('admin.pendaftaran.index', $data);
    // }

    // public function disetujui()
    // {
    //     $data = [
    //         'title' => 'Pendaftaran Disetujui',
    //         'pendaftaran' => Pendafatarn::where(['status' => 1])->get(),
    //     ];
    //     return view('admin.pendaftaran.index', $data);
    // }

    // public function ditolak()
    // {
    //     $data = [
    //         'title' => 'Pendaftaran Ditolak',
    //         'pendaftaran' => Pendaftaran::where(['status' => 2])->get(),
    //     ];
    //     return view('admin.pendafatran.index', $data);
    // }

    // public function detail($id)
    // {
    //     $dec_id = Crypt::decrypt($id);
    //     $data = [
    //         'title' => 'Detail Pendaftaran',
    //         'pendaftaran' => Pendaftaran::find($dec_id)
    //     ];
    //     return view('admin.pendaftaran.detail', $data);
    // }

    // public function ubah(Request $request,$id)
    // {
    //     $dec_id = Crypt::decrypt($id);
    //     $pendaftaran = Pendaftaran::find($dec_id);
    //     if($request->status == 1){
    //         $pendaftaran->status = 1;
    //         User::where('id','=',$transaksi->id)->update(['role' => 'Anggota Bimbel']);
    //     }else{
    //         $transaksi->status = 2;
    //         User::where('id','=',$transaksi->id)->update(['role' => 'Calon Anggota Bimbel']);
    //     }

    //     $transaksi->save();
    //     return redirect()->route('admin.pendaftaran.detail',$id)->with('status','Berhasil Memperbaharui Status');
    // }

    // public function cetak_pdf() {
    //     $pendaftaran = Pendaftaran::all();
    //     $pdf = PDF::loadview('admin.pendaftaran.pendaftaran_pdf', ['pendaftaran' => $pendaftaran]);
    //     return $pdf->stream();
    // }
    ////
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pendaftar',
        ];
        return view('admin.pendaftaran.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $validator = Validator($request->all(), [
            'nama_pendaftar' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelas' => 'required',
            'alamat_rumah' => 'required',
            'nama_ortu' => 'required',
            'jenjang_sekolah' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'bukti_transfer' => 'required|mimes:png,jpg,jpeg',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.pendaftaran.tambah')->withErrors($validator)->withInput();
        } else {
            $file = $request->file('bukti_transfer')->store('buktitf','public');
            $obj = [
                'nama_pendaftaran' => $request->nama_pendaftaran,
                'tgl_lahir' => $request->tgl_lahir,
                'no_hp' => $request->no_hp,
                'jenjang_sekolah' => $request->jenjang_sekolah,
                'jenis_kelas' => $request->jenis_kelas,
                'alamat_rumah' => $request->alamat_rumah,
                'nama_ortu' => $request->nama_ortu,
                'no_rekening' => $request->no_rekening,
                'atas_nama' => $request->atas_nama,
                'bukti_transfer' => $file,
                'status' => Crypt::decrypt($request->status),
            ];
            Pendaftaran::insert($obj);
            return redirect()->route('admin.pendaftaran')->with('status', 'Berhasil Menambah Pendaftar Baru');
        }
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail Pendaftar',
            'pendaftaran' => User::find($dec_id)
        ];
        return view('admin.pendaftaran.detail', $data);
    }

    public function hapus($id)
    {
        $dec_id = Crypt::decrypt($id);
        $pendaftaran = Pendaftaran::find($dec_id);
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran')->with('status', 'Berhasil Menghapus Pendaftar');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Pendaftar',
            'pendaftar' => Pendaftaran::find($dec_id)
        ];
        return view('admin.pendaftaran.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $validator = Validator($request->all(), [
            'nama_pendaftar' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenjang_sekolah' => 'required',
            'jenis_kelas' => 'required',
            'alamat_rumah' => 'required',
            'nama_ortu' => 'required',
            'jenjang_sekolah' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'bukti_transfer' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.pendaftaran.edit', $id)->withErrors($validator)->withInput();
        } else {
            $pendaftaran = Pendaftaran::find($dec_id);
                $pendaftaran->nama_pendaftar = $request->nama_pendaftar;
                $pendaftaran->tgl_lahir = $request->tgl_lahir;
                $pendaftaran->no_hp = $request->no_hp;
                $pendaftaran->jenjang_sekolah = $request->jenjang_sekolah;
                $pendaftaran->jenis_kelas = $request->jenis_kelas;
                $pendaftaran->alamat_rumah = $request->alamat_rumah;
                $pendaftaran->nama_ortu = $request->nama_ortu;
                $pendaftaran->no_rekening = $request->no_rekening;
                $pendaftaran->atas_nama = $request->atas_nama;
                $pendaftaran->bukti_transfer = $request->bukti_transfer;
                $pendaftaran->status = $request->status;
            $pendaftaran->save();
            return redirect()->route('admin.pendaftaran.detail',$id)->with('status', 'Berhasil Memperbarui Pendaftar');
        }
    }

    public function cetak_pdf() {
        $pendaftaran = Pendaftaran::all();
        $pdf = PDF::loadview('admin.pendaftaran.pendaftaran_pdf', ['pendaftaran' => $pendaftaran]);
        return $pdf->stream();
    }
}
