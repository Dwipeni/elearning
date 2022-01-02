<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => User::all()
        ];
        return view('admin.user.index',$data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User',
        ];
        return view('admin.user.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.tambah')->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => Crypt::decrypt($request->role)
            ];
            User::insert($obj);
            return redirect()->route('admin.user')->with('status', 'Berhasil Menambah User Baru');
        }
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail User',
            'user' => User::find($dec_id)
        ];
        return view('admin.user.detail', $data);
    }

    public function hapus($id)
    {
        $dec_id = Crypt::decrypt($id);
        $user = User::find($dec_id);
        $user->delete();
        return redirect()->route('admin.user')->with('status', 'Berhasil Menghapus User');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit User',
            'user' => User::find($dec_id)
        ];
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $id)->withErrors($validator)->withInput();
        } else {
            $user = User::find($dec_id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->role = Crypt::decrypt($request->role);

            $user->save();
            return redirect()->route('admin.user.detail',$id)->with('status', 'Berhasil Memperbarui User');
        }
    }

    public function cetak_pdf() {
        $user = User::all();
        $pdf = PDF::loadview('admin.user.user_pdf', ['user' => $user]);
        return $pdf->stream();
    }

    public function editprofil()
    {
        $data = [
            'title' => 'Edit Profil',
        ];

        return view('admin.akun.editprofil',$data);
    }

    public function simpaneditprofil(Request $request)
    {
        if ($request->email == Auth::user()->email) {
            $validator = Validator::make($request->all(), [
                'name' => 'required:string',
                'email' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required:string',
                'email' => 'required|unique:users|email'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->route('akun.editprofil')->withErrors($validator)->withInput();
        } else {
            User::where('id', '=', Auth::user()->id)->update([
                'email' => $request->email,
                'name' => $request->name
            ]);
            return redirect()->route('admin.editprofil')->with('status', 'Berhasil memperbarui profil');
        }
    }

    public function editkatasandi()
    {
        $data = [
            'title' => 'Edit Katasandi',
        ];
        return view('admin.akun.editkatasandi',$data);
    }

    public function simpaneditkatasandi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('akun.editkatasandi')->withErrors($validator)->withInput();
        } else {
            User::where('id', '=', Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin')->with('status', 'Berhasil memperbarui katasandi');
        }
    }
}
