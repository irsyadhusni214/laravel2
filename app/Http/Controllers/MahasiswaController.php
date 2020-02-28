<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mhs = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mhs'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }


    public function store(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Dibuat']);
    }


    public function show($id)
    {
        $dosen = Dosen::all();
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mhs', 'dosen'));
    }


    public function edit($id)
    {
        $dosen = Dosen::all();
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mhs', 'dosen'));
    }


    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Di Ubah']);
    }


    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
