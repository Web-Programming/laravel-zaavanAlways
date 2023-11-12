<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo',function(){
    // return "Halo Semua";
    return "<a href='". route('call'). "'>" . route('call') . "</a>";
});

Route::get('/kampus',function(){
    echo "<h2>Halo Semua</h2>";
    echo "Kami Kuliah di Kampus MDP";
});

// Route::get('/mahasiswa/{nama}',function($nama){
//     echo "<h2>Halo Semua</h2>";
//     echo "Nama Saya $nama";
// });

// Route::get('/mahasiswa/{nama?}',function($nama = 'Angga'){
//     echo "<h2>Halo Semua</h2>";
//     echo "Nama Saya $nama";
// });

Route::get('/profil/{nama?}/{pekerjaan?}',function($nama = 'Angga',$pekerjaan = 'Mahasiswa'){
    echo "<h2>Halo Semua</h2>";
    echo "Nama Saya $nama, sebagai $pekerjaan";
});

Route::get('/profil/{nama?}/{pekerjaan?}',function($nama = 'Angga' , $pekerjaan = 'Mahasiswa'){
    echo "<h2>Halo Semua</h2>";
    echo "Nama Saya $nama, sebagai $pekerjaan";
})->where('nama','[A-Z]+');

Route::get('/hubungi',function(){
    echo "<h2>Hubungi Kami</h2>";
});
Route::redirect('/contact','/hubungi');

Route::get('/hubungi',function(){
    echo "<h2>Hubungi Kami</h2>";
})->name('call');

Route::get('/dosen/jadwal',function(){
    return "<h2>Jadwal</h2>";
});

Route::get('/dosen/materi',function(){
    return "<h2>Materi Perkuliahan</h2>";
});

Route::prefix('/dosen')->group(function(){
    Route::get('/jadwal',function(){
        return "<h2>Jadwal</h2>";
    });
    Route::get('/materi',function(){
        return "<h2>Materi Perkuliahan</h2>";
    });
});

Route::get('/dosen',function(){
    return view ('dosen');
});

Route::get('/dosen/index',function(){
    return view ('dosen.index');
});

Route::get('/fakultas',function(){
    // return view ('fakultas.index',["ilkom" =>"Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view('fakultas.index',["fakultas"=>["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index')->with("fakultas",["Fakultas Ilmu Komputer dan Rekayasa",
    // "Fakultas Ilmu Ekonomi"]);
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"];
    return view ('fakultas.index',compact('fakultas','kampus'));
});

Route::get('/prodi',[ProdiController::class,'index']);

Route::get('/mahasiswa/inseret',[MahasiswaController::class, 'inseret']);
Route::get('/mahasiswa/update',[MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete',[MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select',[MahasiswaController::class, 'select']);

Route::get('/mahasiswa/insert-qb',[MahasiswaController::class, 'insertQb']);
Route::get('/mahasiswa/update-qb',[MahasiswaController::class, 'updateQb']);
Route::get('/mahasiswa/delete-qb',[MahasiswaController::class, 'deleteQb']);
Route::get('/mahasiswa/select-qb',[MahasiswaController::class, 'selectQb']);

Route::get('/mahasiswa/insert-elq',[MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq',[MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq',[MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq',[MahasiswaController::class, 'selectElq']);

Route::get('/prodi/all-join-facade',[ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq',[ProdiController::class, 'allJoinElq']);