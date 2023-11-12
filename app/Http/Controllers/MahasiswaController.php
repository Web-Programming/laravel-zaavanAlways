<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function inseret(){
        $result = DB::insert('insert into mahasiswas(npm,nama,tempat_lahir,tanggal_lahir,
        created_at) value(?, ?, ?, ?, ?)',['2226250023','Angga','Palembang',
        '2004-04-23',now()]);
        dump($result);
    }
    public function update(){
        $result = DB::update('update mahasiswas set nama = "Genos",
        updated_at = now() where npm  = ?',['2226250023']);
        dump($result);
    }
    public function delete(){
        $result = DB::delete('delete from mahasiswas where npm = ? ',['2226250023']);
        dump($result);
    }
    public function select(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view ('mahasiswa.index',['allmahasiswa'=>$result, 'kampus'=>$kampus]);
    }
    public function insertQb(){
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1923250001',
                'nama' => 'VannXHere',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2023-11-9',
                'created_at' => now()
            ]
            );
            dump($result);
    }
    public function updateQb(){
        $result = DB::table('mahasiswas')->where('npm','1923250001')->update(
            [
                'nama' => 'Kurohige',
                'updated_at' => now()
            ]
            );
            dump($result);
    }
    public function deleteQb(){
        $result = DB::table('mahasiswas')->where('npm', '=', '1923250001')->delete();
        dump($result);
    }
    public function selectQb(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        return view ('mahasiswa.index',['allmahasiswa'=>$result, 'kampus'=>$kampus]);
    }
    public function insertElq(){
        $mahasiswa = new Mahasiswa; //instansiasi class Mahasiswa
        $mahasiswa ->npm = '1923240001'; //isi property
        $mahasiswa ->nama = 'Roronoa';
        $mahasiswa ->tempat_lahir = 'EastBlue';
        $mahasiswa ->tanggal_lahir = '2002-02-01';
        $mahasiswa ->save(); //menyimpan data ke tabel mahasiswas
        dump($mahasiswa); // melihat isi $mahasiswa
    }
    public function updateElq(){
        $mahasiswa = Mahasiswa::where('npm','1923240001')->first();//cari data tabel mahasiswas berdasarkan npm
        $mahasiswa -> nama = 'NamiSwan';
        $mahasiswa ->save();//menyimpan data ke tabel mahasiswas
        dump($mahasiswa);// melihat isi $mahasiswa  
    }
    public function deleteElq(){
        $mahasiswa = Mahasiswa::where('npm','1923240001')->first(); //cari data tabel mahasiswas berdasarkan npm
        $mahasiswa->delete();// hapus data npm 1923240001
        dump($mahasiswa);
    }
    public function selectElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index',['allmahasiswa'=>$mahasiswa , 'kampus'=>$kampus]);
    }
}

?>