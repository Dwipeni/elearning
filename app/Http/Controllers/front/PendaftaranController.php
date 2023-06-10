<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jadwal',
            'pendaftaran' => Pendaftaran::all()
        ];
        return view('front.pendaftaran.index',$data);
    }

    public function simpan(Request $request)
    {

        $validator = Validator($request->all(), [
            'nama_pendaftar' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenjang_sekolah' => 'required',
            'jenis_kelas' => 'required',
            'nama_ortu' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'bukti_transfer' => 'required|mimes:png,jpg,jpeg',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pendaftaran')->withErrors($validator)->withInput();
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
                'bukti' => $file,
                'status' => Crypt::decrypt($request->status),
            ];
            Pendaftaran::insert($obj);
            return redirect()->route('pendaftaran')->with('status', 'Berhasil Melakukan Pendaftaran');
        }
    }

    // public function uploadulang(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'bukti' => 'required|mimes:png,jpg,jpeg'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect('upgradepremium')->withErrors($validator)->withInput();
    //     }else{
            
    //         $file = $request->file('bukti')->store('buktitf','public');
    //         $obj = [
    //             'users_id' => Auth::user()->id,
    //             'status' => '0',
    //             'bukti_transfer' => $file
    //         ];

    //         Transaksi::where('id','=',Auth::user()->id)->update($obj);
    //         return redirect('upgradepremium')->with('status','Berhasil Mengirim Ulang Transfer');
    //     }
    // }
}