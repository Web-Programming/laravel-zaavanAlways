<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/halo', function () {
    // return "Halo Semua";
    return "<a href = '" . route('call') . "'>" . route('call') . "</a>";

});

Route::get("/kampus", function () {
    echo "<h2>Halo Semua</h2>";
    echo "Kami Kuliah di kampus MDP";
});

Route::get("/mahasiswa/{nama}", function ($nama) {
    echo "<h2> Halo Semua</h2>";
    echo "Nama Saya $nama";
});

Route::get("/mahasiswa/{nama?}", function ($nama = 'mamad') {
    echo "<h2>Halo Semua</h2>";
    echo "Nama Saya $nama";
});

//Route dengan parameter  > 1
Route::get("/profil/{nama?}/{pekerjaan?}", function ($nama = "Angga", $pekerjaan = "Mahasiswa") {
    echo "<h2>Halo Semua</h2>";
    echo "Nama Saya $nama. Sebagai $pekerjaan";
});

Route::get("/profil/{nama?}/{pekerjaan?}", function ($nama = 'Bambang', $pekerjaan = 'mahasiswa') {
    echo "<h2>Halo Semua</h2>";
    echo "Nama Saya $nama, sebagai $pekerjaan";
})->where("nama", "[A-Z]+");

Route::get("/hubungi", function () {
    echo "<h2>Hubungi Kami</h2>";
});
Route::redirect("/contact", "/hubungi");

//Redirect dan named route
Route::get("/hubungi", function () {
    echo "<h1>Hubungi kami</h1>";
})->name("call"); //named route

Route::get("/dosen/jadwal", function () {
    return "<h2>Jadwal</h2>";
});

Route::get("/dosen/materi", function () {
    return "<h2>Materi Perkuliahan</h2>";
});

Route::prefix("/dosen")->group(function () {
    Route::get("/jadwal", function () {
        return "<h2>Jadwal</h2>";
    });
    Route::get("/materi", function () {
        return "<h2>Materi Perkuliahan</h2>";
    });
});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/dosen/idex', function () {
    return view('dosen.index');
});

Route::get('/fakultas ', function () {
    // return view('fakultas.index', [
    //     "ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"
    // ]);
    // return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ekonomi"];
    // return view('fakultas.index', compact('fakultas'));
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

//buat route ke halaman profil
Route::get("/profil", function () {
    return view("profil");
});

