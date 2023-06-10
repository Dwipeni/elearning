<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//ini halaman awal
Route::get('/', 'App\Http\Controllers\front\WelcomeController@index')->name('welcome');
Route::get('/about', 'App\Http\Controllers\front\WelcomeController@about')->name('about');
Route::get('/kelas', 'App\Http\Controllers\front\KelasController@index')->name('kelas');
Route::get('/kelas/detail/{id}', 'App\Http\Controllers\front\KelasController@detail')->name('kelas.detail');
Route::get('/kelas/belajar/{id}/{idvideo}', 'App\Http\Controllers\front\KelasController@belajar')->name('kelas.belajar');
Route::get('/jadwal', 'App\Http\Controllers\front\JadwalController@index')->name('jadwal');
Route::get('/jadwal/detail/{id}', 'App\Http\Controllers\front\jadwalController@detail')->name('jadwal.detail');
Route::get('/podcast', 'App\Http\Controllers\front\PodcastController@index')->name('podcast');
Route::get('/podcast/detail/{id}', 'App\Http\Controllers\front\PodcastController@detail')->name('podcast.detail');
Route::get('/pendaftaran', 'App\Http\Controllers\front\PendaftaranController@index')->name('pendaftaran');
Route::post('/pendaftaran/simpan', 'App\Http\Controllers\front\PendaftaranController@simpan')->name('front.pendaftaran.simpan');

//seputar akun
Route::group(['middleware' => ['auth', 'checkRole:regular,premium']], function () {
    Route::get('/upgradepremium', 'App\Http\Controllers\front\TransaksiController@index')->name('upgradepremium');
    Route::post('/uploadbukti', 'App\Http\Controllers\front\TransaksiController@uploadbukti')->name('uploadbukti');
    Route::post('/uploadulang', 'App\Http\Controllers\front\TransaksiController@uploadulang')->name('uploadulang');

    Route::get('/akun', 'App\Http\Controllers\front\AkunController@index')->name('akun');
    Route::get('/akun/editprofil', 'App\Http\Controllers\front\AkunController@editprofil')->name('akun.editprofil');
    Route::post('/akun/simpaneditprofil', 'App\Http\Controllers\front\AkunController@simpaneditprofil')->name('akun.simpaneditprofil');
    Route::get('/akun/editkatasandi', 'App\Http\Controllers\front\AkunController@editkatasandi')->name('akun.editkatasandi');
    Route::post('/akun/simpaneditkatasandi', 'front\AkunController@simpaneditkatasandi')->name('akun.simpaneditkatasandi');
});

//ini halaman admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/admin', 'App\Http\Controllers\admin\DashboardController@index')->name('admin');

    //Kelas
    Route::get('/admin/kelas', 'App\Http\Controllers\admin\KelasController@index')->name('admin.kelas');
    Route::get('/admin/kelas/tambah', 'App\Http\Controllers\admin\KelasController@tambah')->name('admin.kelas.tambah');
    Route::post('/admin/kelas/simpan', 'App\Http\Controllers\admin\KelasController@simpan')->name('admin.kelas.simpan');
    Route::get('/admin/kelas/detail/{id}', 'App\Http\Controllers\admin\KelasController@detail')->name('admin.kelas.detail');
    Route::get('/admin/kelas/hapus/{id}', 'App\Http\Controllers\admin\KelasController@hapus')->name('admin.kelas.hapus');
    Route::get('/admin/kelas/edit/{id}', 'App\Http\Controllers\admin\KelasController@edit')->name('admin.kelas.edit');
    Route::post('/admin/kelas/update/{id}', 'App\Http\Controllers\admin\KelasController@update')->name('admin.kelas.update');
    Route::get('/admin/kelas/tambahvideo/{id}', 'App\Http\Controllers\admin\KelasController@tambahvideo')->name('admin.kelas.tambahvideo');
    Route::post('/admin/kelas/simpanvideo/{id}', 'App\Http\Controllers\admin\KelasController@simpanvideo')->name('admin.kelas.simpanvideo');
    Route::get('/admin/kelas/hapusvideo/{id}/{idkelas}', 'App\Http\Controllers\admin\KelasController@hapusvideo')->name('admin.kelas.hapusvideo');

    //Jadwal
    Route::get('/admin/jadwal', 'App\Http\Controllers\admin\JadwalController@index')->name('admin.jadwal');
    Route::get('/admin/jadwal/tambah', 'App\Http\Controllers\admin\JadwalController@tambah')->name('admin.jadwal.tambah');
    Route::post('/admin/jadwal/simpan', 'App\Http\Controllers\admin\JadwalController@simpan')->name('admin.jadwal.simpan');
    Route::get('/admin/jadwal/detail/{id}', 'App\Http\Controllers\admin\JadwalController@detail')->name('admin.jadwal.detail');
    Route::get('/admin/jadwal/hapus/{id}', 'App\Http\Controllers\admin\JadwalController@hapus')->name('admin.jadwal.hapus');
    Route::get('/admin/jadwal/edit/{id}', 'App\Http\Controllers\admin\JadwalController@edit')->name('admin.jadwal.edit');
    Route::post('/admin/jadwal/update/{id}', 'App\Http\Controllers\admin\JadwalController@update')->name('admin.jadwal.update');

    //Pendaftaran
    Route::get('/admin/pendaftaran', 'App\Http\Controllers\admin\PendaftaranController@index')->name('admin.pendaftaran');
    Route::get('/admin/pendaftaran/tambah', 'App\Http\Controllers\admin\PendaftaranController@tambah')->name('admin.pendaftaran.tambah');
    Route::post('/admin/pendaftaran/simpan', 'App\Http\Controllers\admin\PendaftaranController@simpan')->name('admin.pendaftaran.simpan');
    Route::get('/admin/pendaftaran/detail/{id}', 'App\Http\Controllers\admin\PendaftaranController@detail')->name('admin.pendaftaran.detail');
    Route::get('/admin/pendaftaran/hapus/{id}', 'App\Http\Controllers\admin\PendaftaranController@hapus')->name('admin.pendaftaran.hapus');
    Route::get('/admin/pendaftaran/edit/{id}', 'App\Http\Controllers\admin\PendaftaranController@edit')->name('admin.pendaftaran.edit');
    Route::post('/admin/pendaftaran/update/{id}', 'App\Http\Controllers\admin\PendaftaranController@update')->name('admin.pendaftaran.update');
    Route::get('/admin/pendaftaran/pendaftaran_pdf', 'App\Http\Controllers\admin\PendaftaranController@cetak_pdf')->name('admin.pendaftaran.pendaftaran_pdf');

    //User
    Route::get('/admin/user', 'App\Http\Controllers\admin\UserController@index')->name('admin.user');
    Route::get('/admin/user/tambah', 'App\Http\Controllers\admin\UserController@tambah')->name('admin.user.tambah');
    Route::post('/admin/user/simpan', 'App\Http\Controllers\admin\UserController@simpan')->name('admin.user.simpan');
    Route::get('/admin/user/detail/{id}', 'App\Http\Controllers\admin\UserController@detail')->name('admin.user.detail');
    Route::get('/admin/user/hapus/{id}', 'App\Http\Controllers\admin\UserController@hapus')->name('admin.user.hapus');
    Route::get('/admin/user/edit/{id}', 'App\Http\Controllers\admin\UserController@edit')->name('admin.user.edit');
    Route::post('/admin/user/update/{id}', 'App\Http\Controllers\admin\UserController@update')->name('admin.user.update');
    Route::get('/admin/user/user_pdf', 'App\Http\Controllers\admin\UserController@cetak_pdf')->name('admin.user.user_pdf');

    //Podcast
    Route::get('/admin/podcast', 'App\Http\Controllers\admin\PodcastController@index')->name('admin.podcast');
    Route::get('/admin/podcast/tambah', 'App\Http\Controllers\admin\PodcastController@tambah')->name('admin.podcast.tambah');
    Route::post('/admin/podcast/simpan', 'App\Http\Controllers\admin\PodcastController@simpan')->name('admin.podcast.simpan');
    Route::get('/admin/podcast/detail/{id}', 'App\Http\Controllers\admin\PodcastController@detail')->name('admin.podcast.detail');
    Route::get('/admin/podcast/hapus/{id}', 'App\Http\Controllers\admin\PodcastController@hapus')->name('admin.podcast.hapus');
    Route::get('/admin/podcast/edit/{id}', 'App\Http\Controllers\admin\PodcastController@edit')->name('admin.podcast.edit');
    Route::post('/admin/podcast/update/{id}', 'App\Http\Controllers\admin\PodcastController@update')->name('admin.podcast.update');

    //Transaksi
    Route::get('/admin/transaksi', 'App\Http\Controllers\admin\TransaksiController@index')->name('admin.transaksi');
    Route::get('/admin/transaksi/belumdicek', 'App\Http\Controllers\admin\TransaksiController@belumdicek')->name('admin.transaksi.belumdicek');
    Route::get('/admin/transaksi/ditolak', 'App\Http\Controllers\admin\TransaksiController@ditolak')->name('admin.transaksi.ditolak');
    Route::get('/admin/transaksi/disetujui', 'App\Http\Controllers\admin\TransaksiController@disetujui')->name('admin.transaksi.disetujui');
    Route::get('/admin/transaksi/detail/{id}', 'App\Http\Controllers\admin\TransaksiController@detail')->name('admin.transaksi.detail');
    Route::post('/admin/transaksi/ubah/{id}', 'App\Http\Controllers\admin\TransaksiController@ubah')->name('admin.transaksi.ubah');
    Route::get('/admin/transaksi/transaksi_pdf', 'App\Http\Controllers\admin\TransaksiController@cetak_pdf')->name('admin.transaksi.transaksi_pdf');

    //Setting
    Route::get('/admin/setting', 'App\Http\Controllers\admin\SettingController@index')->name('admin.setting');
    Route::post('/admin/setting/simpan', 'App\Http\Controllers\admin\SettingController@simpan')->name('admin.setting.simpan');

    Route::get('/admin/editprofil', 'App\Http\Controllers\admin\UserController@editprofil')->name('admin.editprofil');
    Route::post('/admin/simpaneditprofil', 'App\Http\Controllers\admin\UserController@simpaneditprofil')->name('admin.simpaneditprofil');

    Route::get('/admin/editkatasandi', 'App\Http\Controllers\admin\UserController@editkatasandi')->name('admin.editkatasandi');
    Route::post('/admin/simpaneditkatasandi', 'App\Http\Controllers\admin\UserController@simpaneditkatasandi')->name('admin.simpaneditkatasandi');
});
