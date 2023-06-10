<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'jadwal' => Jadwal::paginate(9)
        ];

        return view('front.jadwal.index', $data);
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'jadwal' => Jadwal::find($dec_id)
        ];

        return view('front.jadwal.detail', $data);
    }
}