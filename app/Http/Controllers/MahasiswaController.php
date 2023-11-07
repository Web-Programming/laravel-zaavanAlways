<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insertElq(){
    //single Assignment
    // $mhs = new Mahasiswa();
    // $mhs->nama = "Angga Afriliansyah";
    // $mhs->npm = "222625023";
    // $mhs->tempat_lahir = "Spain";
    // $mhs->tanggal_lahir = date("Y-m-d"); //Tanggal lahir
    // $mhs -> save();
  

    //Mass Assignment
    $mhs = Mahasiswa::insert([
    'nama' => 'Angga Afriliansyah',
    'npm' => '22262543', 
    'tempat_lahir' => 'rumah sakit',
    'tanggal_lahir' => date('2004-04-23'),
    ],
    [
    'nama' => 'bambang',
    'npm' => '2187020',
    'tempat_lahir' => 'dalam bendungan',
    'tanggal_lahir'=> date('2004-40-2')
    ],
     [
    'nama' => 'asep',
    'npm' => '2187022',
    'tempat_lahir' => 'dalam bendungan',
    'tanggal_lahir'=> date('2004-04-2')
    ]
);
  dump($mhs);
} 
public function updateElq(){

}
public function deleteElq(){
}
public function allJoinElq(){
  $kampus = "Universitas Multi Data Palembang";
  $mahasiswa = Mahasiswa::has('prodi')->get();
  return view ('mahasiswa.index',['allmahasiswa'=>$mahasiswa, 'kampus'=>$kampus]);
}


}
