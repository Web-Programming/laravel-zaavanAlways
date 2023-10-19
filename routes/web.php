<?php

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

//buat route ke halaman profil
Route :: get("/profil", function(){
    return view("profil");
});

//Route dengan parameter
Route::get("/mahasiswa/{nama}", function($nama = "Angga"){
    echo "<h1>Hallo, Nama Saya $nama</h2>";
});

Route::get('/mahasiswa/index',function(){
    return view('mahasiswa.index');
});


Route::get('/fakultas ',function(){
    return view ('fakultas.index',[
        "ilkom" =>"Fakultas Ilmu Komputer dan Rekayasa"
    ]);
});

//Route dengan parameter tidak wajib
Route::get("/mahasiswa2/{nama?}", function($nama = "Angga"){
    echo "<h1>Hallo, Nama Saya $nama</h2>";
});

//Route dengan parameter  > 1
Route::get("/profil/{nama?}/{pekerjaan?}", function($nama = "Angga", $pekerjaan = "Mahasiswa"){
    echo "<h1>Hallo, Nama Saya $nama. Saya Adalah $pekerjaan</h2>";
});

//Redirect dan named route
Route :: get("/hubungi", function(){
    echo "<h1>Hubungi kami</h1>";
}) ->name("call"); //named route

Route::redirect("/contact","/hubungi");

//Route dengan nama
Route :: get("/halo",function(){
    echo "<a href = '". route('call'). "'>" .route('call')."</a>";
});

//Route group
//Memudahkan kita mengelompokkan route per modul
Route::prefix("/Mahasiswa")->group(function(){
    Route::get("/jadwal",function(){
        echo "<h1>Jadwal Mahasiswa</h1>";
    });
    Route::get("/materi",function(){
        echo "<h1>Materi Perkuliahan</h1>";
    });
    //dan lain2
}); 