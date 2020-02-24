<?php

use App\Mahasiswa;
use App\Dosen;
use App\Hobi;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

// Route One To One
Route::get('relasi', function () {
    // Memilih Data mahasiswa yang memiliki nim '1023912093'
    $mhs = Mahasiswa::where('nim', '=', '192013912')->first();

    // Menampilkan data
    return $mhs->Wali->nama;
});

Route::get('relasi-2', function () {
    // Memilih Data mahasiswa yang memiliki nim '1023912093'
    $mhs = Mahasiswa::where('nim', '=', '192013912')->first();

    // Menampilkan data dosen dari mahasiswa yang dipilih
    return $mhs->Dosen->nama;
});

// One To Many
Route::get('relasi-3', function () {
    // Mencari Dosen yang bernama Abudl Wahab
    $dosen = Dosen::where('nama', '=', 'Abdul Wahab')->first();

    // Menampilkan data mahasiswa dari dosen yang dipilih
    foreach ($dosen->mahasiswa as $temp)
        echo '<li><strong>Nama : ' . $temp->nama . '</strong>',
            '<strong><br>Nim : ' . $temp->nim . '</strong<br></li>';
});

Route::get('relasi-4', function () {
    // Mencari Mahasiswa yang bernama soleh mahmud
    $soleh = Mahasiswa::where('nama', '=', 'soleh mahmud')->first();

    // Menampilkan seluruh hobi dari soleh mahmud
    foreach ($soleh->hobi as $temp)
        echo '<li><strong>Hobi : ' . $temp->hobi . '</strong></li>';
});

Route::get('relasi-5', function () {
    // Mencari hobi
    $gaming = Hobi::where('hobi', '=', 'Main Game')->first();

    // Menampilkan semua mahasiswa yang mempunyai hobi main game
    foreach ($gaming->mahasiswa as $temp)
        echo '<li><strong>Nama : ' . $temp->nama . '</strong>',
            '<strong><br>Nim : ' . $temp->nim . '</strong<br></li>';
});

Route::get('relasi-join', function () {
    //join laravel

    $sql = DB::table('mahasiswas')
        ->select('mahasiswas.nama', 'mahasiswas.nim', 'walis.nama as nama_wali')
        ->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')->get();
    dd($sql);
});

Route::get('eloquent', function () {
    $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobi')->get();
    return view('eloquent', compact('mahasiswa'));
});

Route::get('latihan-eloquent', function () {
    $surs = DB::table('mahasiswas')
        ->select('mahasiswas.nama', 'walis.nama as nama_wali', 'dosens.nama as nama_dosen', 'dosens.nipd', 'mahasiswas.hobi')
        ->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')
        ->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')->get();
});
