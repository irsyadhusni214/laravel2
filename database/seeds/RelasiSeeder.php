<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;
use Illuminate\Support\Facades\DB;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobis')->delete();

        //Membuat Data Dosen
        $dosen = Dosen::create([
            'nama' => 'Abdul Wahab',
            'nipd' => '1232414321'
        ]);
        $this->command->info('Data Dosen Berhasil Dibuat');

        //Membuat Data Mahasiswa
        $sule = Mahasiswa::create([
            'nama' => 'Sule juned',
            'nim' => '192013912',
            'id_dosen' => $dosen->id
        ]);

        $opik = Mahasiswa::create([
            'nama' => 'opik cris',
            'nim' => '192013953',
            'id_dosen' => $dosen->id
        ]);

        $soleh = Mahasiswa::create([
            'nama' => 'soleh mahmud',
            'nim' => '193842835',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil Dibuat');

        //Membuat Data Wali
        $kusnadi = Wali::create([
            'nama' => 'Kusnadi',
            'id_mahasiswa' => $sule->id
        ]);

        $dobleh = Wali::create([
            'nama' => 'Dobleh',
            'id_mahasiswa' => $opik->id
        ]);

        $supri = Wali::create([
            'nama' => 'Supri',
            'id_mahasiswa' => $soleh->id
        ]);
        $this->command->info('Data Wali Berhasil Dibuat');

        //Membuat Data Hobi
        $ngusep = Hobi::create([
            'hobi' => 'Mancing rezeki'
        ]);

        $gaming = Hobi::create([
            'hobi' => 'Main Game'
        ]);

        $mengaji = Hobi::create([
            'hobi' => 'Baca Al Quran'
        ]);

        //melampirkan hobi ke mahasisa

        $sule->hobi()->attach($ngusep->id);
        $opik->hobi()->attach($gaming->id);
        $soleh->hobi()->attach($mengaji->id);
        $this->command->info('Data Hobi Mahasiswa Berhasil Dibuat');
    }
}
